<?php

namespace App\Service;

use App\Http\Dto\User\UserDto;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(
        private $repository = new UserRepository()
    )
    {
    }

    public function getList(): Collection
    {
        return $this->repository->getList();
    }

    public function store(UserDto $dto): User|Model
    {
        return $this->repository->store($dto->toArray());
    }

    public function update(User $user, UserDto $dto): User|Model
    {
        return $this->repository->update($user, $dto->toArray());
    }

    public function delete(User $user): bool
    {
        return $this->repository->delete($user);
    }
}
