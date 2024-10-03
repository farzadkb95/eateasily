<?php

namespace App\Services;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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
        Log::info('Entering createGuest method', ['ip' => $ip]);

        if ($this->guest || request()->user()) {
            return $this->guest;
        }
        $guest = new Guest;
        $guest->token = uniqid(str()->random(8));
        Log::info('Generated guest token', ['token' => $guest->token]);

        $guest->ip = $ip;
        // $guest->current_url = request()->fullUrl(); // This captures the current URL the guest visited
        $guest->current_url = url()->previous();

        Log::info('Captured current URL', ['current_url' => $guest->current_url]);

        $guest->save();

        $this->guest = $guest;

        return $this->guest;
    }
}
