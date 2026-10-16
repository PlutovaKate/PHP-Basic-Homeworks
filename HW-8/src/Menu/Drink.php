<?php

declare(strict_types=1);

namespace Cafe\Menu;

/*
 * ДЗ №7 — «Кавʼярня».
 * КРОК 1. Напій. Перший клас, який має підхопити твій автозавантажувач.
 *
 * Шлях файлу й простір імен мусять збігатися за правилом PSR-4:
 * Cafe\Menu\Drink  →  src/Menu/Drink.php
 *
 * Документація:
 * https://www.php.net/manual/uk/language.namespaces.php
 * https://www.php-fig.org/psr/psr-4/examples/
 */

// 1.5. Оголоси простір імен: namespace Cafe\Menu;
// TODO:

// 1.6. Оголоси class Drink із типізованими властивостями:
//      private string $title;  // «Кава по-турецьки»
//      private int $price;     // 55 (гривні, цілим числом)
//      private int $volumeMl;  // 150
//      і конструктором, який приймає всі три значення.
// TODO:

// 1.7. Методи:
//      title(): string    — назва
//      price(): int       — ціна
//      label(): string    — «Кава по-турецьки, 150 мл»
// TODO:

class Drink
{
    private string $title;
    private int $price;
    private int $volumeMl;

    public function __construct(string $title, int $price, int $volumeMl)
    {
        $this->title = $title;
        $this->price = $price;
        $this->volumeMl = $volumeMl;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function label(): string
    {
        return $this->title . ', ' . $this->volumeMl . ' ml';
    }
}
