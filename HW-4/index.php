<?php

require_once 'Ticket.php';
require_once 'StudentTicket.php';
require_once 'VipTicket.php';

$ticket = new Ticket('Kateryna Plutova');
$ticket->number = 1;


echo $ticket->getHolder();
echo '<br>';

// echo $ticket->holder;
// Fatal error: Uncaught Error: Cannot access private property Ticket::$holder
// $holder — private и достыпный внутри класса Ticket.
// $basePrice — protected доступный внутри класса Ticket и его детей.


echo Ticket::TYPE;
echo '<br>';

echo Ticket::CURRENCY;
echo '<br>';

echo $ticket->price();
echo '<br>';

echo $ticket->info();
echo '<br>';

$ticket = new Ticket('Oleksandr Plutov');
echo $ticket->info();
echo '<br>';

$ticket = new Ticket('Oleksandr Fesenko');
echo $ticket->info();
echo '<br>';


$student = StudentTicket::create('Roman');
echo $student->info();
// Здесь вызывается унаследованный метод: create()
// А благодаря: new static(...) создаётся именно объект StudentTicket.
echo '<br>';

 echo $student::class;
 echo '<br>';

 echo Ticket::issuedCount();
 echo '<br>';

 unset($student);


$vip = VipTicket::create('Artem');
echo $vip->info();
echo '<br>';

 echo $vip::class;
 echo '<br>';

 echo Ticket::issuedCount();
 echo '<br>';

 unset($vip);














?>