<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestDataResource;
use App\Services\TestService;
use Illuminate\Http\Request;

class WeightLessTestController extends Controller
{
    public function selectGender(Request $request, TestService $testService)
    {
        $testService->setGender($request->guest(), $request->gender);

        return response()->json(new GuestDataResource($request->guest()));
    }
}
