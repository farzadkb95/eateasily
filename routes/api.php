<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WeightLessTestController;
use App\Http\Middleware\NotEnterMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->middleware(NotEnterMiddleware::class);
Route::get('/initial-data', [AuthController::class, 'initialData']);
Route::get('/get-latest-test', [TestController::class, 'latestTest']);
Route::post('/new-test', [TestController::class, 'newTest']);

Route::prefix('weight-less/')->group(function () {
    Route::post('/select-gender', [WeightLessTestController::class, 'selectGender']);
    Route::post('/select-age', [WeightLessTestController::class, 'selectAge']);
    Route::post('/select-height', [WeightLessTestController::class, 'selectHeight']);
    Route::post('/select-weight', [WeightLessTestController::class, 'selectWeight']);
    Route::post('/set-other', [WeightLessTestController::class, 'setOther']);
    Route::get('/analyze', [WeightLessTestController::class, 'getAnalyze']);
});
