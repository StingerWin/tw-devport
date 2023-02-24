<?php

namespace App\Service;

use App\Models\HashLink;
use App\Models\Winning;
use App\Repositories\WinningRepository;
use Illuminate\Support\Collection;

class WinningService
{
    public function __construct(
        private $repository = new WinningRepository()
    )
    {
    }

    public function storeForHashLink(HashLink $hashLink): Winning
    {
        return $this->repository->storeForHashLink($hashLink);
    }

    public function calculateWinning(int $randNumber): float
    {
        if ($randNumber % 2 === 1)
            return 0;

        return match (true) {
            $randNumber > 900 => $randNumber * 0.7,
            $randNumber > 600 => $randNumber * 0.5,
            $randNumber > 300 => $randNumber * 0.3,
            $randNumber <= 300 => $randNumber * 0.1,
        };
    }

    public function history(HashLink $hashLink, ?int $limit = 3): Collection
    {
        return $this->repository->history($hashLink, $limit);
    }
}
