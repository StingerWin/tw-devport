<?php

namespace App\Service;

use App\Models\HashLink;
use App\Models\User;
use App\Repositories\HashLinkRepository;
use Illuminate\Database\Eloquent\Model;

class HashLinkService
{
    public function __construct(
        private $repository = new HashLinkRepository()
    )
    {
    }

    public function storeForUser(User $user): HashLink
    {
        return $this->repository->storeForUser($user);
    }

    public function deactivate(HashLink $hashLink): Model
    {
        return $this->repository->update($hashLink, ['deactivated' => true]);
    }
}
