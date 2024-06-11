<?php

namespace App\Providers;

use App\Models\Guest;
use App\Services\GuestService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class GuestServiceProvider extends ServiceProvider
{
    public $singletons = [
        GuestService::class => GuestService::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(GuestService $guestService): void
    {
        if (request()->is('api/*')) {
            Request::macro('guest', function () use ($guestService): ?Guest {
                if (request()->hasHeader('gid')) {
                    $guest = $guestService->identifyGuest(request()->header('gid'));
                }
                if (blank(@$guest)) {
                    $guest = $guestService->createGuest(request()->ip());
                }

                return $guest;
            });
        }
    }
}
