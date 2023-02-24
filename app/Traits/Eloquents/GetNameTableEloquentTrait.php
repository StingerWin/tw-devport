<?php

namespace App\Traits\Eloquents;

trait GetNameTableEloquentTrait
{
    public static function getNameTable(): string
    {
        return (new self())->getTable();
    }
}
