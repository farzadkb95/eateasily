<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Http\Resources\GuestDataResource;
use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function latestTest(Request $request)
    {
        return response()->json(new GuestDataResource($request->guest()));
    }

    public function newTest(Request $request, TestService $testService)
    {
        $newTest = $testService->newTest($request->guest());

        return response()->json(new DataResource($newTest));
    }
}
