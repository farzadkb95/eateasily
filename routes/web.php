<?php

use App\Http\Controllers\FrontRouteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
 use App\Models\TestPrice;

Route::controller(FrontRouteController::class)->group(function () {
    Route::get('/', 'default');
    if (config('app.env') == 'production') {
        // Route::get('/post/{id}', 'post')->where('id', '[0-9]+');
    }
    Route::get('/{any?}', 'default')->where('any', '.*'); // important
});
 
 
Route::post('/admin/coupons', [CouponController::class, 'store']);
Route::get('/admin/coupons', [CouponController::class, 'index']);  // Optional: to list coupons

Route::post('/coupons', [CouponController::class, 'store']);

// If you also want to keep the GET route for listing coupons, include this:
Route::get('/coupons', [CouponController::class, 'index']);

 // routes/web.php
Route::post('/apply-coupon', [CouponController::class, 'applyCoupon']);
