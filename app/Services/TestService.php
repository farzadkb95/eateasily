<?php

namespace App\Services;

use App\Models\Data;
use App\Models\Guest;
use App\Models\OtherData;

final class TestService
{
    public function newTest(Guest $guest)
    {
        $tests = $guest->tests()->where('status', 'in_process')->get();
        info($tests);
        if ($tests->isNotEmpty()) {
            $tests->map(function ($test) {
                $test->status = 'unfinished';
                $test->save();
            });
        }
        $newTest = new Data();
        $newTest->type = 'weight less';
        $guest->latestTest()->save($newTest);

        return $newTest;
    }

    public function setGender(Guest $guest, $step, $value)
    {
        $guest->latestTest->gender = $value;
        $guest->latestTest->step = $step;
        $guest->latestTest->save();
    }

    public function setAge(Guest $guest, $step, $value)
    {
        $guest->latestTest->age = $value;
        $guest->latestTest->step = $step;
        $guest->latestTest->save();
    }

    public function setHeight(Guest $guest, $step, $value)
    {
        $guest->latestTest->height = $value;
        $guest->latestTest->step = $step;
        $guest->latestTest->save();
    }

    public function setWeight(Guest $guest, $step, $value)
    {
        $guest->latestTest->weight = $value;
        $guest->latestTest->step = $step;
        $guest->latestTest->save();
    }

    public function setOther(Guest $guest, $step, $value)
    {
        $type = 'text';
        if (is_numeric($value)) {
            $type = 'number';
        } elseif (is_array($value)) {
            $type = 'json';
        }
        OtherData::updateOrCreate([
            'data_id' => $guest->latestTest->id,
            'key' => $step,
        ], [
            'type' => $type,
            'value' => $type == 'json' ? json_encode($value) : $value,
        ]);

        $guest->latestTest->step = $step;
        $guest->latestTest->save();
        $guest->latestTest->load('other');
    }

    public function analyze(Guest $guest)
    {
        /**
         * @var Data $test
         */
        $test = $guest->latestTest()->where('status', 'in_process')->with('other')->first();
        $test->status = 'finished';
        $test->save();

        $other = $test->other->mapWithKeys(function ($item) {
            return [$item['key'] => $item['type'] == 'json' ? json_decode($item['value']) : $item['value']];
        });

        // $test->merge(['other' => $other]);
        $test = $test->toArray();
        $test['other'] = $other;

        return [
            'x' => round($this->calcX($test), 1),
            'y' => round($this->calcY($test), 1),
            'r' => round($this->calcR($test), 0),
            'l' => round($this->calcL($test), 0),
            'age_offset' => round($this->calcAgeOffset($test), 1),
            'fat_risk' => round($this->calcFatRisk($test), 0),
        ];

    }

    protected function calcX($test)
    {
        $x = [];

        $x[] = [
            1 => -2,
            2 => 3,
            3 => 3,
            4 => 2,
            5 => 4,
        ][$test['other']['weight-less|select-weight-type']];

        $x[] = [
            1 => -1,
            2 => 0,
            3 => 3,
        ][$test['other']['weight-less|sleep-question']];

        $x[] = [
            1 => -2,
            2 => 2,
            3 => 2,
            4 => -2,
        ][$test['other']['weight-less|fingers-form']];

        $x[] = [
            1 => 0,
            2 => 0,
            3 => 2,
            4 => -3,
            5 => -3,
        ][$test['other']['weight-less|your-description-two']];

        $x[] = [
            1 => 3,
            2 => 0,
            3 => -3,
        ][$test['other']['weight-less|wrist-size']];

        return collect($x)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcY($test)
    {
        $y = [];

        $y[] = [
            1 => -2,
            2 => 0,
            3 => 2,
            4 => 1,
        ][$test['other']['weight-less|smooth-muscle']];

        $y[] = [
            1 => 2,
            2 => 2,
            3 => -2,
            4 => -2,
        ][$test['other']['weight-less|fingers-form']];

        $y[] = [
            1 => 3,
            2 => 0,
            3 => -4,
        ][$test['other']['weight-less|pulse-status']];

        $y[] = [
            1 => -3,
            2 => 3,
            3 => 0,
            4 => -2,
            5 => 2,
        ][$test['other']['weight-less|your-description-two']];

        $y[] = [
            1 => -2,
            2 => 0,
            3 => 2,
        ][$test['other']['weight-less|wrist-size']];

        return collect($y)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcR($test)
    {
        $r = [];

        $r[] = [
            1 => 60,
            2 => 40,
        ][$test['other']['weight-less|relish-condition']];

        $r[] = [
            1 => 60,
            2 => 40,
        ][$test['other']['weight-less|weight-less-target']];

        return collect($r)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcL($test)
    {
        $l = [];

        $l[] = [
            1 => 40,
            2 => 60,
        ][$test['other']['weight-less|relish-condition']];

        $l[] = [
            1 => 40,
            2 => 60,
        ][$test['other']['weight-less|weight-less-target']];

        return collect($l)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcAgeOffset($test)
    {
        $age = [];

        $age[] = [
            1 => 5,
            2 => 3,
            3 => 0,
            4 => -1.5,
        ][$test['other']['weight-less|walking-condition']];

        $age[] = [
            1 => -1,
            2 => 0,
            3 => 4,
        ][$test['other']['weight-less|sleep-question']];

        return collect($age)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcFatRisk($test)
    {
        $risk = [];

        $risk[] = [
            1 => 60,
            2 => 20,
        ][$test['other']['weight-less|your-description']];

        $risk[] = [
            1 => 70,
            2 => 30,
        ][$test['other']['weight-less|social-relationship']];

        $risk[] = [
            1 => 70,
            2 => 50,
            3 => 30,
        ][$test['other']['weight-less|community-influence']];

        return collect($risk)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function removeNull($var)
    {
        return $var !== null && $var !== false && $var !== '';
    }
}
