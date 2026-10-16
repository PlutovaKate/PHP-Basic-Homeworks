<?php

require_once 'MediaItem.php';
require_once 'Downloadable.php';
require_once 'Book.php';
require_once 'Movie.php';
require_once 'Rateable.php';
require_once 'Podcast.php';

$book = new Book ('Кобзар', 1840, 320);
echo $book ->card() . '<br>';

// $movie = new Movie ('Аватар', 2026, 97);
// echo $movie ->card() . '<br>';

$movie1 = new Movie('Дюна', 2021, 155, 1400);
echo $movie1 ->card() . '<br>';

$movie2 = new Movie('Дюна 2', 2024, 166, 2600);
echo $movie2 ->card() . '<br>';

echo '<br>';


$library = [
    new Book('Кобзар', 1840, 320),
    new Movie('Тіні забутих предків', 1965, 97, 1400),
    new Movie('Дюна', 2021, 155, 2600),
    new Movie('Земля', 1930, 75, 800),
    new Podcast('Кури', 2024, 45, 60, 4.8),
];

foreach($library as $item){
    echo $item->card() . '<br>';

    if ($item instanceof Downloadable) {
        echo $item->download() . '<br>';
    } else {
        echo 'Недоступно для завантаження. <br>';
    }

    echo '<br>';
}

// Проверяем instanceof Downloadable, а не instanceof Movie потому что нам важно не то, является ли объект фильмом,
// а поддерживает ли он скачивание. Скачать можно и Movie, и другие классы, которые реализуют Downloadable.

