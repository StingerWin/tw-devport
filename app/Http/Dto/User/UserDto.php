<?php

namespace App\Http\Dto\User;

use App\Traits\ClassToArrayTrait;

class UserDto
{
    use ClassToArrayTrait;

    public function __construct(
        private string $name,
        private string $phone
    )
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}
