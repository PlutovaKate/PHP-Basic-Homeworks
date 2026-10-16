<?php

declare(strict_types=1);

/*
 * ДЗ №7 — «Кавʼярня».
 * КРОК 1. Власний автозавантажувач.
 *
 * Досі ми підключали кожен клас вручну: require_once для кожного файлу.
 * Тепер хай PHP сам шукає файл у момент, коли клас уперше знадобиться.
 *
 * Документація:
 * https://www.php.net/manual/uk/language.oop5.autoload.php
 * https://www.php.net/manual/uk/function.spl-autoload-register.php
 * https://www.php-fig.org/psr/psr-4/
 */

// 1.1. Зареєструй функцію-автозавантажувач через spl_autoload_register().
//      Вона отримує ОДИН аргумент — повне імʼя класу, якого не вистачає,
//      наприклад: Cafe\Menu\Drink
// TODO:
spl_autoload_register(function (string $class): void {

    // Експеримент №1:
    // echo "шукаю: " . $class . "\n";

    // При створенні об'єкта Drink PHP викликав автозавантажувач.
    // У браузері з'явилося: шукаю: Cafe\Menu\Drink.
    // Це означає, що PHP шукає клас у момент першого використання,
    // якщо він ще не був завантажений.

    $prefix = 'Cafe\\';

    if (!str_starts_with($class, $prefix)) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $relativePath = str_replace('\\', '/', $relativeClass);

    $file = __DIR__ . '/src/' . $relativePath . '.php';

    if (is_file($file)) {
        require_once $file;
    }
});

// Експеримент №3:

// Помилка: Fatal error:  Uncaught Error: Class "Cafe\Menu\Drink" not found in /var/www/html/index.php:37
// Stack trace:
// #0 {main}
//   thrown in /var/www/html/index.php on line 37

// Автозавантажувач шукав клас у src/Menu/Drink.php,
// але файл був переміщений у src/Drink.php.
// Автозавантажувач не знайшов файл, оскільки шлях до нього
// більше не відповідав простору імен за правилом PSR-4.

// 1.2. Усередині функції зроби те саме, що описує PSR-4:
//      - префікс простору імен, за який ми відповідаємо: 'Cafe\\'
//      - базова папка для цього префікса: __DIR__ . '/src/'
//      - якщо клас НЕ починається з нашого префікса — просто return
//        (можливо, його завантажить хтось інший);
//      - відріж префікс від імені класу (substr + strlen);
//      - заміни зворотні слеші на слеші папок (str_replace) і додай '.php';
//      - якщо такий файл існує (is_file) — підключи його через require_once.
// TODO:

// 1.3. ЕКСПЕРИМЕНТ. Тимчасово додай першим рядком функції echo 'шукаю: ' . $class . "\n";
//      Онови сторінку й подивись, які класи й у якому порядку просить PHP.
// Що ти побачив (скільки разів викликалася функція і коли саме)?
// Відповідь:

// 1.4. ЕКСПЕРИМЕНТ. Створи в index.php обʼєкт класу, для якого немає файлу,
//      наприклад new \Cafe\Menu\Pizza(). Онови сторінку й запиши помилку.
//      Потім прибери цей рядок.
// Помилка:

// Чому в автозавантажувачі ми робимо return, а не кидаємо помилку,
// якщо префікс класу чужий?
// Відповідь:

// Чому require_once, а не require?
// Відповідь:
