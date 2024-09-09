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
                'ideal_weight' => $test->ideal_weight,
                'extra_weight' => $test->extra_weight,
                'x_value' => $test->x_value,
                'y_value' => $test->y_value,
                'right' => $test->right,
                'left' => $test->left,
                'age_offset' => $test->age_offset,
                'fat_risk' => $test->fat_risk,
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
                        $options = data_get($pages, $item['key'].'.options');
                        if (filled($options) && filled(data_get($options, $item['value']))) {
                            $value = $options[$item['value']];
                        } else {
                            $value = data_get($item, 'value');
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
