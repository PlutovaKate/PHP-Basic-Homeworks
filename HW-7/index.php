<?php

require_once 'src/Models/Player.php';
require_once 'src/View/Player.php';

use Turnir\Models\Player;
use Turnir\View\Player as PlayerView;

// Експеримент №1:
// Fatal error: Cannot use Turnir\View\Player as Player because the name is already
// in use in /var/www/html/index.php on line 7
// Stack trace: #0 {main}

$nika = new Player('Ніка');
// echo $nika->nickname;

// Експеримент №2:
// Fatal error: Uncaught Error: Class "Player" not found in /var/www/html/index.php:14
//  Stack trace: #0 {main} thrown in /var/www/html/index.php on line 14

echo 'Повне імʼя класу: ' . $nika::class . '<br>';
echo 'Коротке імʼя з use: ' . Player::class . '<br>';

// Player — это короткое имя благодаря use Turnir\Models\Player.
// Оператор ::class возвращает полное имя класса с его namespace,
// поэтому выводится Turnir\Models\Player.

$nika->city = 'Київ';
$nika->rating = 1500;

// $nika->nickname = 'Нікуся';
// __set() не викликається для nickname, тому що nickname —
// реально оголошена public-властивість класу.

echo $nika->city;
echo '<br>';
echo $nika->rating;
echo '<br>';

$nika->email = 'nika@example.com';
var_dump(isset($nika->email));
echo '<br>';

unset($nika->email);
var_dump(isset($nika->email));
echo '<br>';

var_dump($nika->email);
echo '<br>';

echo 'getCity(): ' . $nika->getCity() . '<br>';
echo 'getRating(): ' . $nika->getRating() . '<br>';

try {
    $nika->fly();
} catch (\BadMethodCallException $exception) {
    echo 'Зловили: ' . $exception->getMessage() . '<br>';
}

$ostap = Player::create('Остап');
echo $ostap->nickname;
echo '<br>';
$ostap->city = 'Дніпро';
echo $ostap->city;
echo '<br>';
$ostap->rating = '1300';
echo $ostap->rating;
echo '<br>';

echo $nika;
echo '<br>';
echo $ostap;
echo '<br>';

$view = new PlayerView();
echo $view($nika, $ostap);
echo '<br>';

echo 'Токен Ніки: ' . $nika->token();
echo '<br>';

echo '<br>=== Серіалізація ===<br>';

echo 'Токен до: ' . $nika->token() . '<br>';

$serialized = serialize($nika);

echo 'serialize(): ' . $serialized . '<br>';

var_dump($nika);
echo '<br>';
var_dump($serialized);
echo '<br>';

$restored = unserialize($serialized);
echo '<br>';


echo 'Відновлений гравець: ' . $restored . '<br>';
echo 'Новий токен: ' . $restored->token() . '<br>';
