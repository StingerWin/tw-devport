<?php

namespace App\Observers;

use App\Models\HashLink;
use App\Models\Winning;
use App\Service\WinningService;
use Illuminate\Support\Str;

class WinningObserver
{
    /**
     * Handle the HashLink "creating" event.
     */
    public function creating(Winning $winning): void
    {
        $service = app(WinningService::class);

        $winning->rand_number = rand(1, 1000);
        $winning->total = $service->calculateWinning($winning->rand_number);
    }
}
