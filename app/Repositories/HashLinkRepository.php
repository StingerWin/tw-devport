<?php

namespace App\Repositories;

use App\Models\HashLink;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class HashLinkRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new HashLink();
    }

    public function storeForUser(User $user): Model|HashLink
    {
        return $user->hashLinks()->create();
    }
}
