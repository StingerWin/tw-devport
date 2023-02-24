<?php

namespace App\Repositories;

use App\Models\HashLink;
use App\Models\Winning;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class WinningRepository
{
    public function storeForHashLink(HashLink $HashLink): Model|Winning
    {
        return $HashLink->winnings()->create();
    }

    public function history(HashLink $HashLink, ?int $limit = null): Collection
    {
        $query = $HashLink->winnings();

        if ($limit)
            $query->limit($limit);

        return $query->latest()->get();
    }
}
