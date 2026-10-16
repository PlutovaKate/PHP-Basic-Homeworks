<?php

namespace Turnir\View;

use Turnir\Models\Player as PlayerModel;

class Player
{
    public function __invoke(PlayerModel ...$players): string
    {
        $result = '';

        foreach ($players as $index => $player) {
            $result .= ($index + 1) . '. ' . $player . '<br>';
        }
        return $result;
    }
    // Два класса Player различаются полным именем с namespace:
    // Turnir\Models\Player и Turnir\View\Player.

    // __invoke() позволяет вызвать объект как функцию: $view(...).
    // $view(...) автоматически вызывает __invoke(),
    // а $view->render(...) был бы обычным вызовом реально объявленного метода render().
}
