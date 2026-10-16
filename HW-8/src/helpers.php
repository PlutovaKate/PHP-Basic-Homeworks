<?php

declare(strict_types=1);

use Cafe\Support\Money;

function uah(int $amount): string
{
    return Money::format($amount);
}
