<?php

namespace App\Services;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Builder;

class GuestService
{
    protected $guest;

    public function identifyGuest(string $token): ?Guest
    {
        if ($this->guest) {
            return $this->guest;
        }
        $this->guest = Guest::where('token', $token)->with('latestTest.other')->first();

        return $this->guest;
    }

    public function asGuestByTest(int $testId): ?Guest
    {
        if ($this->guest) {
            return $this->guest;
        }
        $this->guest = Guest::whereHas('tests', function (Builder $query) use ($testId) {
            $query->where('id', $testId);
        })->with('test', function ($query) use ($testId) {
            $query->where('id', $testId)->with('other');
        })->first();

        return $this->guest;
    }

    public function createGuest(string $ip): ?Guest
    {
        if ($this->guest || request()->user()) {
            return $this->guest;
        }
        $guest = new Guest;
        $guest->token = uniqid(str()->random(8));
        $guest->ip = $ip;
        $guest->save();

        $this->guest = $guest;

        return $this->guest;
    }
}
