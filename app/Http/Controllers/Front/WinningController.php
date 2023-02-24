<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HashLink;
use App\Service\WinningService;

class WinningController extends Controller
{
    public function __construct(
        private WinningService $service
    )
    {
    }

    public function experienceLuck(HashLink $hashLink)
    {
        $winning = $this->service->storeForHashLink($hashLink);

        return redirect()->route('front.page.index', $hashLink->token)->with('winning', $winning);
    }
}
