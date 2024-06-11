<?php

namespace App\Services;

use App\Models\Data;
use App\Models\Guest;

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
}
