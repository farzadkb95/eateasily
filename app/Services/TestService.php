<?php

namespace App\Services;

use App\Models\Data;
use App\Models\Guest;
use App\Models\OtherData;
use App\Models\Payment;
use App\Models\UserAction;
use Facades\App\Services\MailService;
use Facades\App\Services\PaymentService;
use Facades\App\Services\SmsService;
use Illuminate\Contracts\Database\Eloquent\Builder;

final class TestService
{
    public function newTest(Guest $guest)
    {
        $tests = $guest->tests()->where('status', 'in_process')->get();
        info($tests);
        if ($tests->isNotEmpty()) {
            $tests->map(function ($test) {
                $test->status = 'unfinished';
                $test->save();
            });
        }
        $newTest = new Data();
        $newTest->type = 'weight less';
        $guest->latestTest()->save($newTest);

        return $newTest;
    }

    public function setGender(Guest $guest, $step, $value)
    {
        $guest->latestTest->gender = $value;
        $guest->latestTest->step = $step;
        $guest->latestTest->save();
    }

    public function setAge(Guest $guest, $step, $value)
    {
        $guest->latestTest->age = $value;
        $guest->latestTest->step = $step;
        $guest->latestTest->save();
    }

    public function setHeight(Guest $guest, $step, $value)
    {
        $guest->latestTest->height = $value;
        $guest->latestTest->step = $step;

        $this->calculateExtraWeight($guest->latestTest);
        if ($guest->latestTest->isDirty()) {
            $guest->latestTest->save();
        }
    }

    public function setWeight(Guest $guest, $step, $value)
    {
        $guest->latestTest->weight = $value;
        $guest->latestTest->step = $step;

        $this->calculateExtraWeight($guest->latestTest);
        if ($guest->latestTest->isDirty()) {
            $guest->latestTest->save();
        }
    }

    public function setPhoneOrMail(Guest $guest, string $step, bool $inside, ?string $phone, ?string $email)
    {
        $randomCode = rand(1000, 9999);
        if ($inside) {
            $guest->latestTest->phone = $phone;
            $action = 'weight_less_phone';
            /**
             * @uses SmsService::sendCode
             */
            SmsService::sendCode($phone, $randomCode);
        } else {
            $guest->latestTest->email = $email;
            $action = 'weight_less_email';
            /**
             * @uses MailService::sendCode
             */
            MailService::sendCode($email, $randomCode);
        }
        $guest->latestTest->step = $step;
        $guest->latestTest->save();

        $userAction = new UserAction;
        $userAction->guest_id = $guest->id;
        $userAction->action = $action;
        $userAction->code = $randomCode;
        $userAction->save();
    }

    public function approveCode(Guest $guest, string $step, int $code)
    {
        $userAction = UserAction::where('guest_id', $guest->id)
            ->where(function (Builder $q) {
                $q->where('action', 'weight_less_phone')
                    ->orWhere('action', 'weight_less_email');
            })
            ->where('created_at', '>', now()->subMinutes(10))
            ->whereNull('used_at')
            ->where('code', $code)
            ->first();

        if ($guest->latestTest->phone_verified_at || $guest->latestTest->email_verified_at) {
            return ['ok' => true, 'message' => 'قبلا ثبت شده'];
        }

        if (blank($userAction)) {
            return ['ok' => false, 'message' => 'کد اشتباه است!'];
        }

        $userAction->used_at = now();
        $userAction->save();

        if ($userAction->action == 'weight_less_phone') {
            $guest->latestTest->phone_verified_at = now();
        } else {
            $guest->latestTest->email_verified_at = now();
        }
        $guest->latestTest->step = $step;
        $guest->latestTest->save();
    }

    public function setOther(Guest $guest, $step, $value)
    {
        $type = 'text';
        if (is_numeric($value)) {
            $type = 'number';
        } elseif (is_array($value)) {
            $type = 'json';
        }
        OtherData::updateOrCreate([
            'data_id' => $guest->latestTest->id,
            'key' => $step,
        ], [
            'type' => $type,
            'value' => $type == 'json' ? json_encode($value) : $value,
        ]);

        $guest->latestTest->step = $step;
        $guest->latestTest->save();
        $guest->latestTest->load('other');
    }

    public function payment(Guest $guest, int $testId): string
    {
        $test = Data::where('id', $testId)->where('guest_id', $guest->id)->first();

        if (blank($test)) {
            abort(422, 'test not found!');
        }

        $payment = PaymentService::createPayment($guest->id, $test->id);

        return PaymentService::payRequest($payment);
    }

    public function paymentVerify(Guest $guest, string $paymentCode, string $authority, string $status): Payment
    {
        $payment = Payment::where('code', $paymentCode)->where('guest_id', $guest->id)->with('data')->first();

        if (blank($payment)) {
            abort(422, 'payment not found!');
        }

        $payment = PaymentService::verifyPayment($payment, $authority, $status);

        return $payment;
    }

    public function calculateExtraWeight(Data $test)
    {
        if ($test->gender && $test->weight && $test->height) {
            $idealWeight = $test->gender == 'male' ? $test->height - 104 : $test->height - 108;
            $extraWeight = $test->weight - $idealWeight;

            $test->extra_weight = $extraWeight;
            $test->ideal_weight = $idealWeight;
            $test->save();
        }
    }

    public function reminderAlert()
    {
        $tests = Data::where('status', 'in_process')->where(function (Builder $q) {
            $q->whereNull('remind_at')->orWhere('remind_at', '<', now()->subDay());
        })->where(function (Builder $q) {
            $q->whereNotNull('phone')->orWhereNotNull('email');
        })->where('remind_count', '<', 2)->where('updated_at', '<', now()->subDay())->get();

        $tests->each(function (Data $test) {
            $sended = false;
            if ($test->phone) {
                /**
                 * @uses \App\Services\MailService::continueReminder
                 */
                SmsService::continueReminder($test->phone);
                $sended = true;
            }
            if ($test->email) {
                /**
                 * @uses \App\Services\MailService::continueReminder
                 */
                MailService::continueReminder($test->email);
                $sended = true;
            }
            if ($sended) {
                $test->remind_at = now();
                $test->remind_count++;
                $test->save();
            }
        });

        return $tests;
    }
}
