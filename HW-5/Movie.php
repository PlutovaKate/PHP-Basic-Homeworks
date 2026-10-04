<?php


class Movie extends MediaItem implements Downloadable
{
    private int $minutes;
    private int $sizeMb;

    public function __construct(string $title, int $year, int $minutes, int $sizeMb)
    {
        parent::__construct($title, $year);
        // parent::__construct() передаёт title и year из Book в MediaItem; 
        // без него эти свойства (title и year) не будут инициализированы.

        $this->minutes = $minutes;
        $this->sizeMb = $sizeMb;
    }

    public function type(): string
    {
        return 'Фильм ';
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
            return 'Файл завеликий: ' . $this->sizeMb . ' МБ, ліміт ' .  self::MAX_SIZE_MB . ' МБ';
        }

        return 'Завантажую «' . $this->title . '» (' . $this->sizeMb . ' МБ)';
    }
}

// через if порівнює розмір із self::MAX_SIZE_MB і повертає Завантажую «Дюна» (1400 МБ)
//  або Файл завеликий: 2600 МБ, ліміт 2048 МБ.

// type() → 'Фільм', duration() → '97 хв'