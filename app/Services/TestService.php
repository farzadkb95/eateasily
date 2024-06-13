<?php

namespace App\Services;

use App\Models\Data;
use App\Models\Guest;
use App\Models\OtherData;

final class TestService
{
    public function newTest(Guest $guest)
    {
        $latestTest = $guest->latestTest;
        if (filled($latestTest) && $latestTest?->status == 'in_process') {
            $latestTest->status = 'unfinished';
            $latestTest->save();
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

    public function setOther(Guest $guest, $step, $question, $value)
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
            'question' => $question,
            'type' => $type,
            'value' => $type == 'json' ? json_encode($value) : $value,
        ]);

        $guest->latestTest->step = $step;
        $guest->latestTest->save();
        $guest->latestTest->load('other');
    }
}
