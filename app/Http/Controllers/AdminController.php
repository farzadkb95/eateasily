<?php

namespace App\Http\Controllers;

use App\Http\Resources\DataResource;
use App\Models\Data;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getTests(Request $request)
    {
        $tests = new Data;

        if ($request->status == 'finished') {
            $tests = $tests->where('status', 'finished');
        } elseif ($request->status == 'in_process') {
            $tests = $tests->where('status', 'in_process');
        } elseif ($request->status == 'unfinished') {
            $tests = $tests->where('status', 'unfinished');
        }

        $tests = $tests->latest()->paginate(20);

        return DataResource::collection($tests);
    }

    public function getTestsCount(Request $request)
    {
        $tests = Data::groupBy('status')->selectRaw('count(*) as total, status')->get()->mapWithKeys(function ($item) {
            return [$item['status'] => $item['total']];
        });

        return $tests;
    }
}
