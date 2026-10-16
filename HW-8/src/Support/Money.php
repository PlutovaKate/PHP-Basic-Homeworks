<?php

declare(strict_types=1);

namespace Cafe\Support;

/*
 * ДЗ №7 — «Кавʼярня».
 * КРОК 2. Гроші. Третій простір імен — Cafe\Support.
 *
 * Cafe\Support\Money  →  src/Support/Money.php
 *
 * Документація:
 * https://www.php-fig.org/psr/psr-4/examples/
 */

// 2.1. namespace Cafe\Support;
// TODO:

class Money
{
    public const CURRENCY = '₴';

    public static function format(int $amount): string
    {
        return $amount . ' ' . self::CURRENCY;
    }
}

// 2.2. class Money із константою public const CURRENCY = '₴';
//      і статичним методом format(int $amount): string, який повертає «55 ₴».
// TODO:
