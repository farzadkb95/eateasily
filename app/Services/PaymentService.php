<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\UserAction;
use Facades\App\Services\MailService;
use Facades\App\Services\SmsService;
use Http;
use Illuminate\Support\Str;
use App\Models\Coupon;
use App\Models\TestPrice; // Import the TestPrice model
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class PaymentService
{
    // public function createPayment(Request $request)
    // {
    //     // Extract the variables from the request
    //     $guestId = $request->input('guestId');
    //     $testId = $request->input('test');
    //     $couponCode = $request->input('coupon_code');
    //     $discountedPrice = $request->input('discounted_price');
    
    //     // Log all input parameters
    //     \Log::info("createPayment called with:", [
    //         'guestId' => $guestId,
    //         'testId' => $testId,
    //         'couponCode' => $couponCode,
    //         'discountedPrice' => $discountedPrice,
    //     ]);
    
    //     // Fetch the dynamic price from the TestPrice model
    //     $testPrice = TestPrice::first();
    
    //     if (!$testPrice) {
    //         \Log::error("Test price not set in the database.");
    //         throw new \Exception("Test price not set in the database.");
    //     }
    
    //     // Log the fetched test price
    //     \Log::info("Test price fetched:", ['price' => $testPrice->price]);
    
    //     // Create a new payment
    //     $payment = new Payment();
    //     $payment->code = uniqid(Str::random(6));
    //     $payment->guest_id = $guestId;
    //     $payment->data_id = $testId;
    //     $payment->gateway = 'zarinpall';
    //     $payment->info = [];
    //     $payment->description = 'خرید برنامه ایت‌ایزیلی';
    
    //     // Use the discounted price if available, otherwise use the original price
    //     $finalAmount = $discountedPrice ?? $testPrice->price;
    //     \Log::info("Final payment amount:", ['finalAmount' => $finalAmount]);
    
    //     // Set the payment amount and save
    //     $payment->amount = $finalAmount;
    //     $payment->save();
    
    //     // Log that the payment has been saved
    //     \Log::info("Payment saved with amount:", ['amount' => $payment->amount]);
    
    //     return $payment;
    // }
    
    public function createPayment(int $guestId, int $testId, ?string $couponCode = null, ?float $discountedPrice = null): Payment
{
    
    // Log all input parameters
    \Log::info("createPayment called with:", [
        'guestId' => $guestId,
        'testId' => $testId,
        'couponCode' => $couponCode,
        'discountedPrice' => $discountedPrice,
    ]);

    // Fetch the dynamic price from the TestPrice model
    $testPrice = TestPrice::first();

    if (!$testPrice) {
        \Log::error("Test price not set in the database.");
        throw new \Exception("Test price not set in the database.");
    }

    // Log the fetched test price
    \Log::info("Test price fetched:", ['price' => $testPrice->price]);

    // Create a new payment
    $payment = new Payment();
    $payment->code = uniqid(Str::random(6));
    $payment->guest_id = $guestId;
    $payment->data_id = $testId;
    $payment->gateway = 'zarinpall';
    $payment->info = [];
    $payment->description = 'خرید برنامه ایت‌ایزیلی';

    // Use the discounted price if available, otherwise use the original price
    $finalAmount = $discountedPrice ?? $testPrice->price;
    \Log::info("Final payment amount:", ['finalAmount' => $finalAmount]);

    // Set the payment amount and save
    $payment->amount = $finalAmount;
    $payment->save();

    // Log that the payment has been saved
    \Log::info("Payment saved with amount:", ['amount' => $payment->amount]);

    return $payment;
}


//     public function createPayment(int $guestId, int $testId, ?string $couponCode = null, ?float $discountedPrice = null): Payment
// {

    
//     // Fetch the dynamic price from the TestPrice model
//     $testPrice = TestPrice::first();

//     if (!$testPrice) {
//         throw new \Exception("Test price not set in the database.");
//     }

//     $payment = new Payment();
//     $payment->code = uniqid(Str::random(6));
//     $payment->guest_id = $guestId;
//     $payment->data_id = $testId;
//     $payment->gateway = 'zarinpall';
//     $payment->info = [];
//     $payment->description = 'خرید برنامه ایت‌ایزیلی';

//     // Use the discounted price if it's available, otherwise use the original price
//     $payment->amount = $discountedPrice ?? $testPrice->price;

//     $payment->save();

//     return $payment;
// }

    // public function createPayment(int $guestId, int $testId, ?string $couponCode = null): Payment
    
    // {
    //         // Fetch the dynamic price from the TestPrice model
    //         $testPrice = TestPrice::first(); // Retrieve the first record
        
    //         if (!$testPrice) {
    //             throw new \Exception("Test price not set in the database.");
    //         }
    
    //     $payment = new Payment();
    //     $payment->code = uniqid(Str::random(6));
    //     $payment->guest_id = $guestId;
    //     $payment->data_id = $testId;
    //     $payment->gateway = 'zarinpall';
    //     $payment->info = [];
    //     $payment->description = 'خرید برنامه ایت‌ایزیلی';
    //     // $payment->amount = 8930000;
    //     $payment->amount = $testPrice->price; // Use the dynamic price from the database

    //     $originalAmount= $payment->amount;
    //     $discount = 0;
    //     if ($couponCode) {
    //         $coupon = Coupon::where('code', $couponCode)
    //             ->where('expiry_date', '>=', now())
    //             ->first();
    
    //         if ($coupon) {
    //             // Determine discount based on coupon type
    //             if ($coupon->discount_type === 'percentage') {
    //                 $discount = $originalAmount * ($coupon->value / 100);
    //             } elseif ($coupon->discount_type === 'amount') {
    //                 $discount = $coupon->value;
    //             }
    //         }
    //     }
    
    //     // Calculate the final amount
    //     $payment->amount = $originalAmount - $discount;
        

    //     $payment->save();

    //     return $payment;
    // }

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

        if ($payment->status == 'success') {
            if ($payment->data->phone) {
                /**
                 * @uses \App\Services\SmsService::sendPayAlert
                 */
                SmsService::sendPayAlert($payment->data->phone);
            }
            if ($payment->data->email) {
                /**
                 * @uses \App\Services\MailService::sendPayAlert
                 */
                MailService::sendPayAlert($payment->data->phone);
            }
        } else {
            if ($payment->data->phone) {
                /**
                 * @uses \App\Services\SmsService::sendPayFailAlert
                 */
                SmsService::sendPayFailAlert($payment->data->phone);
            }
            if ($payment->data->email) {
                /**
                 * @uses \App\Services\MailService::sendPayFailAlert
                 */
                MailService::sendPayFailAlert($payment->data->phone);
            }
        }

        $userAction = new UserAction;
        $userAction->guest_id = $payment->guest_id;
        $userAction->action = 'weight_less_pay_alert';
        $userAction->save();

        return $payment;
    }
}
