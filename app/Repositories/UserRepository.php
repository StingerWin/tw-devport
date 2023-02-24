<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function getList(): Collection
    {
        return $this->model->newQuery()->latest()->get();
    }
}
