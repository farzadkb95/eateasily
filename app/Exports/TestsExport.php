<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;

class TestsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $tests = Data::with(['other', 'guest'])->get()->dot();

        $pages = config('weightLess.pages');
        $pages = collect($pages);
        $pages = $pages->flatMap(function (array $values, $key) {
            return $values;
        });

        $tests = $tests->map(function ($test) use ($pages) {
            return [
                'id' => $test->id,
                'guest_id' => $test->guest_id,
                'phone' => $test->phone,
                'phone_verified' => filled($test->phone_verified_at),
                'email' => $test->email,
                'email_verified' => filled($test->email_verified_at),
                'status' => filled($test->status),
                'step' => $test->step,
                'gender' => $test->gender,
                'age' => $test->age,
                'height' => $test->height,
                'weight' => $test->weight,
                'date' => $test->created_at,
                ...collect($test->other)->mapWithKeys(function ($item) use ($pages) {
                    if ($item['type'] == 'json') {
                        $value = json_decode($item['value']);
                        if (filled($pages[$item['key']]['options'])) {
                            $selected = array_fill_keys($value, null);
                            $value = array_intersect_key($pages[$item['key']]['options'], $selected);
                            $value = implode(', ', $value);
                        }
                    } else {
                        if (filled($pages[$item['key']]['options'])) {
                            $value = $pages[$item['key']]['options'][$item['value']];
                        } else {
                            $value = $item['value'];
                        }
                    }

                    return [$item['key'] => $value];
                }),
            ];
        });

        if ($tests->count()) {
            $tests = $tests->toArray();
            $keys = array_keys($tests[0]);
            array_unshift($tests, $keys);
        }

        return collect($tests);
    }
}
