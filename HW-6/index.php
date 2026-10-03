<?php

require_once 'Likeable.php';
require_once 'Photo.php';
require_once 'Commentable.php';
require_once 'Article.php';



$article = new Article('Фестиваль у дворі школи', 'Оксана Гнатюк');

$article->like();
$article->like();
$article->like();
$article->like();

$article->addComment('Клас!');
$article->addComment('Ми теж там були');

echo '=== Редакція газети ===';
echo  '<br>';

echo $article->card();
echo  '<br>';

foreach ($article->comments() as $comment) {
    echo '— ' . $comment . '<br>';
}

$photo = new Photo('Перший сніг у парку', 'Тарас Бойко');

$photo->like();
$photo->like();

echo $photo->card();
echo  '<br>';

var_dump($article instanceof Likeable);
echo  '<br>';
// bool(false)
// Результат false, потому что Article только использует код трейта Likeable,
// но не является Likeable. В отличие от интерфейса, trait не является типом объекта.
// trait — не класс. Это готовый кусок функциональности, который подключается внутрь класса


// $likeable = new Likeable();
// Fatal error: Uncaught Error: Cannot instantiate trait Likeable
// in /var/www/html/index.php:43 Stack trace: #0 {main} thrown in /var/www/html/index.php on line 43

//////////////////////////////////////// Анонимный класс


$draft = new class('Що буде в наступному номері')
{
    use Likeable;

    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function card(): string
    {
        return 'Чернетка: «' . $this->title . '» — ' . $this->badge();
    }
};


$draft->like();
echo $draft->card();
echo  '<br>';

echo $draft::class;
// class@anonymous/var/www/html/index.php:53$0
// класс без названия anonymous

// Анонимный класс удобен, когда объект нужен один раз и отдельный класс создавать нет смысла.
// Если класс будет использоваться в разных местах, лучше создать обычный класс в отдельном файле.
