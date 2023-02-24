<?php

namespace App\Providers;

use App\Models\HashLink;
use App\Models\Winning;
use App\Observers\HashLinkObserver;
use App\Observers\WinningObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
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
    public function boot(): void
    {
        HashLink::observe(HashLinkObserver::class);
        Winning::observe(WinningObserver::class);
    }
}
