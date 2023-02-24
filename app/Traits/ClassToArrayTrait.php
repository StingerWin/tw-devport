<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ClassToArrayTrait
{
    public function toArray(...$notReturnColumns): array
    {
        $array = get_object_vars($this);
        $return = [];
        foreach ($array as $key => $value) {
            $snakeKey = Str::snake($key);

            if (!in_array($snakeKey, $notReturnColumns))
                $return[$snakeKey] = $value;
        }
        return $return;
    }
}
