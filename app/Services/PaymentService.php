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
            'callback_url' => secure_url('/payment/verify?payment='.$payment->code),
            'metadata' => [
                'payment_id' => $payment->id,
            ],
        ]);

        $res = $res->json();

        return 'https://payment.zarinpal.com/pg/StartPay/'.data_get($res, 'data.authority');
    }
}
