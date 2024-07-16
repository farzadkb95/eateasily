<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestDataResource;
use App\Services\TestAnalyzeService;
use App\Services\TestService;
use Illuminate\Http\Request;

class WeightLessTestController extends Controller
{
    public function selectGender(Request $request, TestService $testService)
    {
        if (! (request()->user()?->is_admin && request()->has('test_id'))) {
            $testService->setGender($request->guest(), $request->step, $request->gender);
        }

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function selectAge(Request $request, TestService $testService)
    {
        if (! (request()->user()?->is_admin && request()->has('test_id'))) {
            $testService->setAge($request->guest(), $request->step, $request->age);
        }

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function selectHeight(Request $request, TestService $testService)
    {
        if (! (request()->user()?->is_admin && request()->has('test_id'))) {
            $testService->setHeight($request->guest(), $request->step, $request->height);
        }

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function selectWeight(Request $request, TestService $testService)
    {
        if (! (request()->user()?->is_admin && request()->has('test_id'))) {
            $testService->setWeight($request->guest(), $request->step, $request->weight);
        }

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function setPhoneOrMail(Request $request, TestService $testService)
    {
        $request->validate([
            'inside' => ['required', 'boolean'],
            'phone' => 'required_if_accepted:inside',
            'email' => 'required_if_declined:inside',
        ]);

        if (! (request()->user()?->is_admin && request()->has('test_id'))) {
            $testService->setPhoneOrMail($request->guest(), $request->step, $request->inside, $request->phone, $request->email);
        }

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function approveCode(Request $request, TestService $testService)
    {
        $request->validate([
            'code' => ['required', 'numeric'],
        ]);

        if (! (request()->user()?->is_admin && request()->has('test_id'))) {
            $testService->approveCode($request->guest(), $request->step, $request->code);
        }

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function setOther(Request $request, TestService $testService)
    {
        if (! (request()->user()?->is_admin && request()->has('test_id'))) {
            $testService->setOther($request->guest(), $request->step, $request->value);
        }

        return response()->json(new GuestDataResource($request->guest()));
    }

    public function payment(Request $request, TestService $testService)
    {
        $request->validate([
            'test' => ['required', 'numeric'],
        ]);

        $payment = null;
        if (! (request()->user()?->is_admin && request()->has('test_id'))) {
            $payment = $testService->payment($request->guest(), $request->test);
        }

        return response()->json([
            'payment_url' => $payment,
        ]);
    }

    public function getAnalyze(Request $request, TestAnalyzeService $testService)
    {
        if (request()->user()?->is_admin && request()->has('test_id')) {
            $result = $testService->analyze($request->guest()->test);
        } else {
            $test = $request->guest()->latestTest;
            $test->status = 'finished';
            $test->save();
            $result = $testService->analyze($test);
        }

        return response()->json($result);
    }

    public function getConfig(Request $request)
    {
        $pages = config('weightLess.pages');

        $pages = collect($pages);

        return response()->json([
            'pages' => $pages->map(function ($part) {
                return collect($part)->keys();
            }),
            'questions' => $pages->flatMap(function (array $values, $key) {
                return $values;
            }),
        ]);
    }
}
