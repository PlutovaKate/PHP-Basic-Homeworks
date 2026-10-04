<?php

class Podcast extends MediaItem implements Downloadable, Rateable
{
    private int $minutes;
    private int $sizeMb;
    private float $rating;

    public function __construct(string $title, int $year, int $minutes, int $sizeMb, float $rating)
    {
        parent::__construct($title, $year);

        $this->minutes = $minutes;
        $this->sizeMb = $sizeMb;
        $this->rating = $rating;
    }

    public function type(): string
    {
        return 'Подкаст ';
    }

    public function duration(): string
    {
        return $this->minutes . ' хв';
    }

    public function sizeMb(): int
    {
        return $this->sizeMb;
    }
    public function download(): string
    {
        if ($this->sizeMb > self::MAX_SIZE_MB) {
            return 'Файл завеликий: ' . $this->sizeMb . 'МБ, ліміт' .  self::MAX_SIZE_MB . 'МБ';
        }

        return 'Завантажую «' . $this->title . '» (' . $this->sizeMb . ' МБ)';
    }


    public function rating(): float
    {
        return $this->rating;
    }
}
