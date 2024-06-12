<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestDataResource;
use App\Services\TestService;
use Illuminate\Http\Request;

class WeightLessTestController extends Controller
{
    public function selectGender(Request $request, TestService $testService)
    {
        $testService->setGender($request->guest(), $request->step, $request->gender);

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function selectAge(Request $request, TestService $testService)
    {
        $testService->setAge($request->guest(), $request->step, $request->age);

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function selectHeight(Request $request, TestService $testService)
    {
        $testService->setHeight($request->guest(), $request->step, $request->height);

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function selectWeight(Request $request, TestService $testService)
    {
        $testService->setWeight($request->guest(), $request->step, $request->weight);

        return response()->json(new GuestDataResource($request->guest()));
    }
}
