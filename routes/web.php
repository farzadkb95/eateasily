<?php

use App\Http\Controllers\FrontRouteController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontRouteController::class)->group(function () {
    Route::get('/', 'default');
    if (config('app.env') == 'production') {
        // Route::get('/post/{id}', 'post')->where('id', '[0-9]+');
    }
    Route::get('/{any?}', 'default')->where('any', '.*'); // important
});
