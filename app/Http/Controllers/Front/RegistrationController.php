<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Registration\RegistrationRequest;
use App\Service\HashLinkService;
use App\Service\RegistrationService;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $request, RegistrationService $registrationService, HashLinkService $hashLinkService)
    {
        $user = $registrationService->register($request->getDto());

        $hashLink = $hashLinkService->storeForUser($user);

        $url = route('front.page.index', $hashLink->token);

        return redirect()->route('front.index')->with('url', $url);
    }
}
