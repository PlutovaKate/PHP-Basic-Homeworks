<?php

declare(strict_types=1);

use Cafe\Menu\Drink;
use Cafe\Support\Money;
use Cafe\Menu\Dessert;
use Cafe\Orders\Order;

/*
 * ДЗ №7 — «Кавʼярня».
 * КРОКИ 1–3. Збираємо замовлення. Умова — у README.md поруч.
 *
 * Документація:
 * https://www.php.net/manual/uk/language.oop5.autoload.php
 * https://getcomposer.org/doc/04-schema.md#autoload
 */

// Крок 1: підключаємо СВІЙ автозавантажувач — єдиний require_once у всьому ДЗ.

// require_once __DIR__ . '/autoload.php';

// Крок 3: коли composer dump-autoload відпрацює, закоментуй рядок вище
// й розкоментуй цей — більше в коді не зміниться НІЧОГО:

require_once __DIR__ . '/vendor/autoload.php';

echo uah(140) . "\n";

// 2.7. Імпортуй класи, якими користуєшся тут (по одному на рядок, за алфавітом):
// TODO: use Cafe\Menu\Dessert;
// TODO: use Cafe\Menu\Drink;
// TODO: use Cafe\Orders\Order;

echo '<pre style="font: 14px/1.5 monospace">';

echo "\n=== Кавʼярня ===\n\n";

// 1.8. Перша перевірка автозавантаження: створи напій
//      new Drink('Кава по-турецьки', 55, 150) і виведи його label().
//      Жодного require для Drink.php ти не писав — файл мусить підхопитися сам.
// TODO:

$drink = new Drink('Кава по-турецьки', 55, 150);
// $testDrink = new Drink('Тест', '55', 150);
echo $drink->label() . "\n";

echo Money::format(55) . "\n";

// Експеримент №2:
// $pizza = new \Cafe\Menu\Pizza();

// Fatal error:  Uncaught Error: Class "Cafe\Menu\Pizza" not found in /var/www/html/index.php:40
// Stack trace:
// #0 {main}
//   thrown in /var/www/html/index.php on line 40
// Автозавантажувач шукав файл src/Menu/Pizza.php,
// але такого файлу немає, тому клас не вдалося завантажити.

// 2.8. Тепер повне замовлення №1: напій «Кава по-турецьки» (55 ₴, 150 мл)
//      і десерт «Чізкейк» (85 ₴, 120 г). Виведи receipt().
// TODO:

$order = new Order(1);

$order->add($drink);

$desert = new Dessert('Чізкейк', 85, 120);
$order->add($desert);

echo "\n" . $order->receipt();

echo "\n" . Drink::class . "\n";
echo Order::class . "\n";

// 2.9. Виведи повні імена класів через ::class — переконайся, що це Cafe\...
// TODO:

// 3.5. Після переходу на composer: виведи рядок із vendor/composer/autoload_psr4.php,
//      який відповідає твоєму префіксу (скопіюй його в коментар нижче).

// Рядок із autoload_psr4.php:
//     'Cafe\\' => array($baseDir . '/src'),



// 4.5. ЕКСПЕРИМЕНТ зі strict_types. Тимчасово передай ціну рядком:
//      new Drink('Тест', '55', 150) — онови сторінку й запиши помилку.
//      Потім прибери рядок. Що було б, якби declare(strict_types=1) не було саме в цьому файлі?
// Помилка:
// TypeError: Argument #2 ($price) must be of type int, string given.

// Відповідь:
// Без declare(strict_types=1) у файлі index.php
// PHP автоматично перетворив би рядок '55' на ціле число 55.
// Строга типізація параметрів залежить від файлу,
// у якому викликається функція або конструктор.

echo '</pre>';
