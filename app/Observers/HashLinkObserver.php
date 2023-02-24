<?php

namespace App\Observers;

use App\Models\HashLink;
use Illuminate\Support\Str;

class HashLinkObserver
{
    /**
     * Handle the HashLink "creating" event.
     */
    public function creating(HashLink $hashLink): void
    {
        $hashLink->token = $hashLink->token ?? Str::random(40);
        $hashLink->expires_at = $hashLink->expires_at ?? now()->addDays(HashLink::DAYS_LIFE_LINK);
    }
}
