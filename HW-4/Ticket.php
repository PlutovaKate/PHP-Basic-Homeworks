<?php

class Ticket {

protected const DISCOUNT = 0;
public const CURRENCY = '₴';
public const TYPE = 'Звичайний';


private string $holder;
protected int $basePrice; 
public int $number;

private static int $issued = 0;

public function __construct(string $holder, int $basePrice = 500){
    $this->holder = $holder;
    $this->basePrice = $basePrice;

    self::$issued++;
    $this->number = self::$issued;
}


public function getHolder(): string {
    return $this->holder;
}


public function price(): int{
return $this->basePrice - $this->basePrice * static:: DISCOUNT /100;
// если static заменить на self, то цена у StudentTicket и VipTicket останется 500
// так как они начали использовать DISCOUNT класса Ticket.
// Причина: self:: обращается к классу, в котором определён метод (Ticket),
// а static:: учитывает класс, через который фактически идёт вызов
}



public function info(): string {
return "№ {$this->number} {$this->holder} - " . static::TYPE . " - {$this->price()} " . self::CURRENCY;
// если static заменить на self, то тип у StudentTicket и VipTicket останется Звичайний
}


public static function issuedCount(): int{
    return self::$issued;
}


public static function create(string $holder, int $basePrice = 500): static {

// Используем static, а не self, чтобы метод создавал объект того класса,
// через который был вызван create(), например StudentTicket или VipTicket.
// Два вида создания объекта: $ticket = new Ticket('Roman'); и $ticket = Ticket::create('Roman');
// То есть create() — это метод, который создаёт и возвращает объект.

   return new static($holder, $basePrice);
}
  


public function __destruct (){
    echo "Квиток № {$this->number} закрито <br> ";
}

}









// Property Promotion:
// class Ticket {
// public int $number;

// public function __construct(private string $holder, protected int $basePrice = 500){}

//     public function getHolder(): string
//     {
//         return $this->holder;
//     }

// }
// Property Promotion: сокращает отдельное объявление свойств и присвоение им значений в конструкторе.


?>