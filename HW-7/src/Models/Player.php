<?php

namespace Turnir\Models;

class Player
{
    public string $nickname;
    private array $data = [];
    private string $token;

    public function __construct(string $nickname)
    {
        $this->nickname = $nickname;
        $this->token = 'tkn-' . random_int(1000, 9999);
    }

    public function __set(string $name, mixed $value): void
    {
        // echo "__set викликано для: $name<br>";
        $this->data[$name] = $value;
    }

    public function __get(string $name): mixed
    {
        return $this->data[$name] ?? null;
        // Без ?? null при обращении к несуществующему ключу массива
        // PHP выдал бы предупреждение Undefined array key.
    }

    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }

    public function __unset(string $name): void
    {
        unset($this->data[$name]);
    }

    public function __call(string $name, array $arguments): mixed
    {
        if (!str_starts_with($name, 'get')) {
            throw new \BadMethodCallException(
                'Немає методу' . static::class . '::' . $name . '()'
            );
        }
        $property = $this->{lcfirst(substr($name, 3))};
        return $property;
    }

    // __call() срабатывает, когда вызываем несуществующий метод у объекта через ->.
    // Например: $nika->getCity().
    //
    // __callStatic() срабатывает, когда вызываем несуществующий статический метод
    // через класс с помощью ::. Например: Player::create('Остап').


    // Не стоит использовать магические методы для всего проекта,
    // потому что по коду сложнее понять, какие методы и свойства реально существуют.
    // Это усложняет чтение кода, поиск ошибок и работу IDE.


    public static function __callStatic(string $name, array $arguments): static
    {
        if ($name !== 'create') {
            throw new \BadMethodCallException(
                'Немає методу' . static::class . '::' . $name . '()'
            );
        }
        return new static(...$arguments);
    }

    public function __toString(): string
    {
        return $this->nickname . ' (' . $this->city . '), рейтинг: ' . $this->rating;
    }

    public function token(): string
    {
        return $this->token;
    }

    public function __serialize(): array
    {
        return [
            'nickname' => $this->nickname,
            'data' => $this->data,
        ];
    }

    // Токены до и после unserialize() разные, потому что token
    // не сохраняется в __serialize(). При восстановлении объекта
    // в __unserialize() создаётся новый случайный token.

    // В строке serialize() нет token, потому что метод __serialize()
    // возвращает только nickname и data.

    // В строке serialize() записано полное имя класса с его namespace:
    // Turnir\Models\Player.

    public function __unserialize(array $saved): void
    {
        $this->nickname = $saved['nickname'];
        $this->data = $saved['data'];
        $this->token = 'tkn-' . random_int(1000, 9999);
    }
}
