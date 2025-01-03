<?php

namespace App\Services;

use App\Models\Data;

class TestAnalyzeService
{
    public function analyze(Data $test)
    {

        $other = $test->other->mapWithKeys(function ($item) {
            return [$item['key'] => $item['type'] == 'json' ? json_decode($item['value']) : $item['value']];
        });

        // $test->merge(['other' => $other]);
        $arrayTest = $test->toArray();
        $arrayTest['other'] = $other;

        $data = [
            'x' => round($this->calcX($arrayTest), 1),
            'y' => round($this->calcY($arrayTest), 1),
            'r' => round($this->calcR($arrayTest), 0),
            'l' => round($this->calcL($arrayTest), 0),
            'age_offset' => round($this->calcAgeOffset($arrayTest), 1),
            'fat_risk' => round($this->calcFatRisk($arrayTest), 0),
        ];
        $suggestionFoods = $this->suggestion($data['x'], $data['y']);
        $data['suggestion'] = $suggestionFoods;

        $this->saveAnalyze($test, $data);

        return $data;
    }

    public function suggestion(float $x, float $y): array
    {
        $arr = [];

        if ($y > 0) {
            $arr = array_merge($arr, [
                'پنیر',
                'ماست و کدو سبز',
                'آب و عسل طبیعی',
                'گوشت ماهی',
                'گوشت مرغ محلی',
                'عدس',
                'سیب',
                'انار',
                'ماش',
            ]);
        } elseif ($y < 0) {
            $arr = array_merge($arr, [
                'آب و عسل و زنجبیل',
                'کشمش',
                'خرما',
                'نخود پخته',
                'گوشت گوسفند',
                'گوشت بلدرچین',
            ]);
        }
        if ($x > 0) {
            $arr = array_merge($arr, [
                'نعنا',
                'زعفران',
                'بادام درختی',
                'تخم مرغ',
                'گردو',
                'عسل',
                'تخم آفتابگردان',
                'بروکلی',
                'چای تازه دم',
            ]);
        } elseif ($x < 0) {
            $arr = array_merge($arr, [
                'کاهو',
                'روغن زیتون',
                'هویج خام',
                'انجیر',
                'خرما',
                'بادام شیرین',
                'خیار',
                'انواع لوبیا',
            ]);
        }

        return $arr;
    }

    protected function calcX($test)
    {
        $x = [];

        $x[] = [
            0 => null,
            1 => -2,
            2 => 3,
            3 => 3,
            4 => 2,
            5 => 4,
        ][@$test['other']['weight-less|select-weight-type'] ?: 0];

        $x[] = [
            0 => null,
            1 => -1,
            2 => 0,
            3 => 3,
        ][@$test['other']['weight-less|sleep-question'] ?: 0];

        $x[] = [
            0 => null,
            1 => 1,
            2 => 1,
            3 => 1,
            4 => -1,
        ][@$test['other']['weight-less|smooth-muscle'] ?: 0];

        $x[] = [
            0 => null,
            1 => -2,
            2 => 2,
            3 => 2,
            4 => -2,
        ][@$test['other']['weight-less|fingers-form'] ?: 0];

        $x[] = [
            0 => null,
            1 => 0,
            2 => 0,
            3 => 2,
            4 => -3,
            5 => -3,
        ][@$test['other']['weight-less|your-description-two'] ?: 0];

        $x[] = [
            0 => null,
            1 => 3,
            2 => 0,
            3 => -3,
        ][@$test['other']['weight-less|wrist-size'] ?: 0];

        return collect($x)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcY($test)
    {
        $y = [];

        $y[] = [
            0 => null,
            1 => -2,
            2 => 0,
            3 => 2,
            4 => 1,
        ][@$test['other']['weight-less|smooth-muscle'] ?: 0];

        $y[] = [
            0 => null,
            1 => 2,
            2 => 2,
            3 => -2,
            4 => -2,
        ][@$test['other']['weight-less|fingers-form'] ?: 0];

        $y[] = [
            0 => null,
            1 => 3,
            2 => 0,
            3 => -4,
        ][@$test['other']['weight-less|pulse-status'] ?: 0];

        $y[] = [
            0 => null,
            1 => -3,
            2 => 3,
            3 => 0,
            4 => -2,
            5 => 2,
        ][@$test['other']['weight-less|your-description-two'] ?: 0];

        $y[] = [
            0 => null,
            1 => -2,
            2 => 0,
            3 => 2,
        ][@$test['other']['weight-less|wrist-size'] ?: 0];

        return collect($y)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcR($test)
    {
        $r = [];

        $r[] = [
            0 => null,
            1 => 70,
            2 => 30,
        ][@$test['other']['weight-less|relish-condition'] ?: 0];

        $r[] = [
            0 => null,
            1 => 60,
            2 => 40,
        ][@$test['other']['weight-less|weight-less-target'] ?: 0];

        return collect($r)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcL($test)
    {
        $l = [];

        $l[] = [
            0 => null,
            1 => 40,
            2 => 60,
        ][@$test['other']['weight-less|relish-condition'] ?: 0];

        $l[] = [
            0 => null,
            1 => 40,
            2 => 60,
        ][@$test['other']['weight-less|weight-less-target'] ?: 0];

        return collect($l)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcAgeOffset($test)
    {
        $age = [];

        $age[] = [
            0 => null,
            1 => 5,
            2 => 3,
            3 => 0,
            4 => -1.5,
        ][@$test['other']['weight-less|walking-condition'] ?: 0];

        $age[] = [
            0 => null,
            1 => -1,
            2 => 0,
            3 => 4,
        ][@$test['other']['weight-less|sleep-question'] ?: 0];

        return collect($age)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function calcFatRisk($test)
    {
        $risk = [];

        $risk[] = [
            0 => null,
            1 => 60,
            2 => 20,
        ][@$test['other']['weight-less|your-description'] ?: 0];

        $risk[] = [
            0 => null,
            1 => 70,
            2 => 30,
        ][@$test['other']['weight-less|social-relationship'] ?: 0];

        $risk[] = [
            0 => null,
            1 => 70,
            2 => 50,
            3 => 30,
        ][@$test['other']['weight-less|community-influence'] ?: 0];

        return collect($risk)->reject(function ($value) {
            return $value === null || $value === '';
        })->avg();
    }

    protected function removeNull($var)
    {
        return $var !== null && $var !== false && $var !== '';
    }

    protected function saveAnalyze(Data $test, array $data)
    {
        $test->x_value = $data['x'];
        $test->y_value = $data['y'];
        $test->right = $data['r'];
        $test->left = $data['l'];
        $test->age_offset = $data['age_offset'];
        $test->fat_risk = $data['fat_risk'];

        $test->save();
    }
}
