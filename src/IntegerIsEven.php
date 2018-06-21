<?php

namespace App;

class IntegerIsEven
{
    /**
     * Determine if the given integer is even
     *
     * @var int $number
     * @return bool
     */
    public function run(int $number): bool
    {
        return $number % 2 === 0;
    }
}
