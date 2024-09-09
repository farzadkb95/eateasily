<?php

namespace App\Http\Controllers;

use App\Exports\TestsExport;
use App\Http\Resources\DataResource;
use App\Models\Data;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        } elseif ($request->status == 'payed') {
            $tests = $tests->whereHas('payments', function (Builder $query) {
                $query->where('status', 'success');
            });
        }

        $tests = $tests->with('guest')->latest()->paginate(20);

        return DataResource::collection($tests);
    }

    public function getTestsCount(Request $request)
    {
        $tests = Data::groupBy('status')->selectRaw('count(*) as total, status')->get()->mapWithKeys(function ($item) {
            return [$item['status'] => $item['total']];
        });

        $payed = Data::whereHas('payments', function (Builder $query) {
            $query->where('status', 'success');
        })->count();

        $tests['payed'] = $payed;

        return $tests;
    }

    public function testsExport()
    {
        return Excel::download(new TestsExport, 'tests.xlsx');
    }
}
