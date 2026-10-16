<?php

declare(strict_types=1);

namespace Cafe\Orders;

use Cafe\Menu\Dessert;
use Cafe\Menu\Drink;
use Cafe\Support\Money;

/*
 * ДЗ №7 — «Кавʼярня».
 * КРОК 2. Замовлення. Другий простір імен — Cafe\Orders.
 *
 * Cafe\Orders\Order  →  src/Orders/Order.php
 *
 * Документація:
 * https://www.php.net/manual/uk/language.namespaces.importing.php
 * https://www.php-fig.org/psr/psr-12/
 */

// 2.3. namespace Cafe\Orders;
// TODO:

// 2.4. Цей клас користується класами з ІНШИХ просторів імен — імпортуй їх.
//      За PSR-12 блок use йде після namespace через порожній рядок,
//      по одному класу на рядок, в алфавітному порядку:
//      use Cafe\Menu\Dessert;
//      use Cafe\Menu\Drink;
//      use Cafe\Support\Money;
// TODO:

// 2.5. class Order:
//      private int $number;    // номер замовлення
//      private array $items = []; // позиції
//      конструктор приймає номер.
// TODO:

class Order
{
    private int $number;
    private array $items = [];

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function add(Drink|Dessert $item): void
    {
        $this->items[] = $item;
    }

    public function total(): int
    {
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->price();
        }

        return $total;
    }

    public function receipt(): string
    {
        $receipt = "Замовлення №" . $this->number . "\n";

        foreach ($this->items as $item) {
            $receipt .= "  " . $item->label() . " — "
                . Money::format($item->price()) . "\n";
        }

        $receipt .= "Разом: " . Money::format($this->total()) . "\n";

        return $receipt;
    }
}


// 2.6. Методи:
//      add(Drink|Dessert $item): void — додає позицію в $items;
//      total(): int                   — сума price() усіх позицій;
//      receipt(): string              — готовий чек (формат — у README):
//        Замовлення №1
//          Кава по-турецьки, 150 мл — 55 ₴
//          Чізкейк, 120 г — 85 ₴
//        Разом: 140 ₴
//      Ціни форматуй через Money::format(), рядки завершуй "\n".
// TODO:

// Ти написав use Cafe\Menu\Drink; — чи підключив цей рядок файл Drink.php?
// Хто насправді його підключив і в який момент?
// Відповідь:
// Рядок use Cafe\Menu\Drink; не підключає файл Drink.php.
// Він лише дозволяє використовувати коротке ім'я класу Drink.
// Файл підключає наш автозавантажувач через spl_autoload_register(),
// коли PHP вперше звертається до класу, який ще не завантажений.