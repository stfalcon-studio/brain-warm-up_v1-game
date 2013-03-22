<?php

namespace Stfalcon;

class Game {

    /**
     * Играем и определяем победителя (в зависимости от к-ва непарных символов)
     *
     * @param $input
     * @return string
     */
    public function whoWillWin($input)
    {
        $oddSymbolsCount = 0; // счетчик непарных символов

        // перебираем символы в строке
        while (strlen($input) > 0) {
            // увеличиваем счетчик если символ встречается непарное к-во раз
            $symbol = $input[0];
            $oddSymbolsCount += substr_count($input, $symbol) % 2;

            // убираем все вхождения символа из строки
            $input = str_replace($symbol, '', $input);
        }

        // если непарных символов нет или их непарное к-во, тогда побеждает первый игрок
        return (!$oddSymbolsCount || $oddSymbolsCount%2) ? 'First' : 'Second';
    }

}