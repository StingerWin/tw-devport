<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HashLink;
use App\Service\HashLinkService;
use App\Service\WinningService;
use Illuminate\Http\Request;

class HashLinkController extends Controller
{
    public function __construct(
       private HashLinkService $hashLinkService
    )
    {
    }

    public function page(Request $request, WinningService $winningService, HashLink $hashLink)
    {
        $winnings = collect();

        if ($request->has('history'))
            $winnings = $winningService->history($hashLink);

        return view('front.page', compact('hashLink', 'winnings'));
    }

    public function store(HashLink $hashLink)
    {
        $hashLink = $this->hashLinkService->storeForUser($hashLink->user);

        $url = route('front.page.index', $hashLink->token);

        return redirect()->route('front.page.index', $hashLink->token)->with('url', $url);
    }

    public function deactivate(HashLink $hashLink)
    {
        $this->hashLinkService->deactivate($hashLink);

        return redirect()->route('front.index')->with('deactivatedLink', $hashLink);
    }
}
