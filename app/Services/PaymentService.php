<?php

namespace App\Services;

use App\Models\Payment;
use Http;
use Illuminate\Support\Str;

class PaymentService
{
    public function createPayment(int $guestId, int $testId): Payment
    {
        $payment = new Payment();
        $payment->code = uniqid(Str::random(6));
        $payment->guest_id = $guestId;
        $payment->data_id = $testId;
        $payment->gateway = 'zarinpall';
        $payment->info = [];
        $payment->description = 'خرید برنامه ایت‌ایزیلی';
        $payment->amount = 9830000;
        $payment->save();

        return $payment;
    }

    public function payRequest(Payment $payment): string
    {
        $res = Http::post('https://payment.zarinpal.com/pg/v4/payment/request.json', [
            'merchant_id' => config('services.zarinpal.merchant_key'),
            'amount' => $payment->amount,
            'currency' => 'IRR',
            'description' => $payment->description,
            'callback_url' => url('/weight-less/pay-verify?payment='.$payment->code),
            'metadata' => [
                'payment_id' => $payment->id,
            ],
        ]);

        $res = $res->json();

        return 'https://payment.zarinpal.com/pg/StartPay/'.data_get($res, 'data.authority');
    }

    public function verifyPayment(Payment $payment, string $authority, string $status): Payment
    {
        if (filled($payment->status)) {
            return $payment;
        }
        $res = Http::post('https://payment.zarinpal.com/pg/v4/payment/verify.json', [
            'merchant_id' => config('services.zarinpal.merchant_key'),
            'amount' => $payment->amount,
            'authority' => $authority,
        ]);

        $res = $res->json();

        info($res);
        if (filled($res['errors'])) {
            logger()->error($res['errors']);
        }

        $payment->status = data_get($res, 'data.code') >= 100 ? 'success' : 'fail';
        $payment->pay_code = data_get($res, 'data.code') ?? data_get($res, 'errors.code');
        $payment->pay_ref = data_get($res, 'data.ref_id');
        $payment->card_number = data_get($res, 'data.card_pan');
        $payment->save();

        return $payment;
    }
}