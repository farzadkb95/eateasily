<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WeightLessTestController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\NotEnterMiddleware;
use Illuminate\Support\Facades\Route;
use App\Models\TestPrice;
use Illuminate\Http\Request;
 
use App\Http\Controllers\CouponController;

Route::post('/login', [AuthController::class, 'login'])->middleware(NotEnterMiddleware::class);
Route::get('/initial-data', [AuthController::class, 'initialData']);
Route::get('/get-latest-test', [TestController::class, 'latestTest']);
Route::post('/new-test', [TestController::class, 'newTest']);

Route::get('/admin/get-tests', [AdminController::class, 'getTests'])->middleware(IsAdminMiddleware::class);
Route::get('/admin/get-tests-count', [AdminController::class, 'getTestsCount'])->middleware(IsAdminMiddleware::class);
Route::get('/admin/tests-export', [AdminController::class, 'testsExport'])->middleware(IsAdminMiddleware::class);

Route::prefix('weight-less/')->group(function () {
    Route::get('/get-config', [WeightLessTestController::class, 'getConfig']);
    Route::post('/select-gender', [WeightLessTestController::class, 'selectGender']);
    Route::post('/select-age', [WeightLessTestController::class, 'selectAge']);
    Route::post('/select-height', [WeightLessTestController::class, 'selectHeight']);
    Route::post('/select-weight', [WeightLessTestController::class, 'selectWeight']);
    Route::post('/set-phone-or-mail', [WeightLessTestController::class, 'setPhoneOrMail']);
    Route::post('/approve-code', [WeightLessTestController::class, 'approveCode']);
    Route::post('/payment', [WeightLessTestController::class, 'payment']);
    Route::post('/payment/verify', [WeightLessTestController::class, 'paymentCallBack']);
    Route::post('/set-other', [WeightLessTestController::class, 'setOther']);
    Route::get('/analyze', [WeightLessTestController::class, 'getAnalyze']);
});

// Route to update the price
Route::post('/admin/update-price', function (Request $request) {
    $request->validate([
        'price' => 'required|numeric|min:0',
    ]);

    $testPrice = TestPrice::first();
    if ($testPrice) {
        $testPrice->price = $request->input('price');
        $testPrice->save();
        return response()->json(['message' => 'Price updated successfully!']);
    } else {
        return response()->json(['message' => 'Price record not found.'], 404);
    }
});
Route::get('/admin/get-price', function () {
    $testPrice = TestPrice::first();
    return response()->json(['price' => $testPrice ? $testPrice->price : null]);
});

Route::post('/apply-coupon', [CouponController::class, 'applyCoupon']);
