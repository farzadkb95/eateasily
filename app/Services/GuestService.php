<?php

namespace App\Services;

use App\Models\Guest;

class GuestService
{
    protected $guest;

    public function identifyGuest(string $token): ?Guest
    {
        if ($this->guest) {
            return $this->guest;
        }
        $this->guest = Guest::where('token', $token)->with('latestTest')->whereNull('user_id')->first();

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
