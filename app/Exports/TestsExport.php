<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Log;

class TestsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        \Log::info('beforee thr collection ' );

        $tests = Data::with(['other', 'guest', 'payments'])->latest()->take(15000)->get()->dot();
        // $tests = Data::with(['other', 'guest', 'payments'])->get()->dot();

        // $tests = Data::with(['other', 'guest', 'payments'])->latest()->get()->dot();

        // \Log::info('Raw tests data:', $tests->toArray());
        \Log::info('inside the collection' );
        $pages = config('weightLess.pages');
        $pages = collect($pages);
        $pages = $pages->flatMap(function (array $values, $key) {
            return $values;
        });
        
        
        $tests = $tests->map(function ($test) use ($pages) {
            $payed = $test->payments->where('status', 'success')->first();
           // Get the current_url from the guest table
           $currentUrl = $test->guest ? $test->guest->current_url : null; // Check if guest exists
            
           // Log the current_url
        //    Log::info('Current URL from guest:', [$currentUrl]);
            return [
                'id' => $test->id,
                // 'guest_id' => $test->guest_id,
                'input_link' => $currentUrl,
                'phone' => $test->phone,
                // 'phone_verified' => filled($test->phone_verified_at) ? '1' : '0',
                'email' => $test->email,
                // 'email_verified' => filled($test->email_verified_at) ? '1' : '0',
                'status' => $test->status,
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
                'payed' => filled($payed) ? '1' : '0',
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
