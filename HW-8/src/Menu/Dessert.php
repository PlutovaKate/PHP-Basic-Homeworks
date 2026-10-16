<?php

declare(strict_types=1);

// ДЗ №7 — «Кавʼярня». КРОК 4.
// УВАГА: цей файл написаний НАВМИСНО неправильно. Він працює, але порушує PSR-12.
// Твоє завдання в кроці 4 — переписати його за стандартом, нічого не зламавши.
// Стандарт: https://www.php-fig.org/psr/psr-12/

namespace Cafe\Menu;

class Dessert
{
  private string $title;
  private int $price;
  private int $weightG;
  public function __construct(string $title, int $price, int $weightG)
  {
    $this->title = $title;
    $this->price = $price;
    $this->weightG = $weightG;
  }
  public function title(): string
  {
    return $this->title;
  }
  public function price(): int
  {
    if ($this->price > 0) {
      return $this->price;
    } else {
      return 0;
    }
  }
  public function label(): string
  {
    return $this->title . ', ' . $this->weightG . ' г';
  }
}
