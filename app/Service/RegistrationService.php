<?php

namespace App\Service;

use App\Http\Dto\User\UserDto;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Model;

class RegistrationService
{
    public function __construct(
        private $repository = new UserRepository()
    )
    {
    }

    public function register(UserDto $dto): Model
    {
        return $this->repository->store($dto->toArray());
    }
}
