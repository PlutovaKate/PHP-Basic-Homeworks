<?php


class Book extends MediaItem
{
    private int $pages;

    public function __construct(string $title, int $year, int $pages)
        {
            parent::__construct($title, $year);
            // parent::__construct() передаёт title и year из Book в MediaItem; 
            // без него эти свойства (title и year) не будут инициализированы.
            
            $this->pages=$pages;
            

        }

    public function type(): string
        {
        return 'Книга ';
        }



        //Тимчасово закоментуй у Book метод duration():
        // Fatal error: Class Book contains 1 abstract method and must therefore be declared abstract
        // or implement the remaining method (MediaItem::duration) in /var/www/html/Book.php on line 4
    public function duration(): string
        {
        return $this->pages . ' сторінок';
        }
}