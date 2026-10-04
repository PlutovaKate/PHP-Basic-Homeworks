<?php

class Photo
{
    use Likeable;

    private string $title;
    private string $author;

    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function badge(): string
    {
        return 'hearts: "' . $this->likes;
    }

    public function card(): string
    {
        return 'Foto: "' . $this->title . '" (' . $this->author . ') - '  . $this->badge();
    }
}
