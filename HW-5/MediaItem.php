<?php

abstract class MediaItem
{
    protected string $title;
    protected int $year;

    public function __construct(string $title, int $year){
        $this->title = $title;
        $this->year = $year;

    }

    abstract public function type(): string;
    abstract public function duration(): string;

    public function card(): string {
        return $this->type() .': ' . $this->title . ' (' . $this->year . ') - ' . $this->duration();
    }
}


// Книга: Кобзар (1840) — 320 сторінок із type(), $title, $year і duration()