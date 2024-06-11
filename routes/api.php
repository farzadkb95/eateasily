<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/initial-data', [AuthController::class, 'initialData']);
Route::get('/get-latest-test', [TestController::class, 'latestTest']);
Route::post('/new-test', [TestController::class, 'newTest']);
