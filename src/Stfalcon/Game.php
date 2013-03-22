<?php

namespace Stfalcon;

class Game {

    static private $results = array();

    /**
     * Играем и определяем победителя по к-ву шансов на победу
     *
     * @param $input
     * @return string
     */
    public function whoWillWin($input)
    {
        self::$results = array();
        self::play($input);

        // @todo когда шансов поровну, тогда проблема )
        return @(self::$results[0] > self::$results[1]) ? 'First' : 'Second';
    }

    /**
     * Запускаем игру рекурсивно
     *
     * @param $string
     * @param int $symbolIndex
     * @param int $playerId
     * @return bool
     */
    static function play($string, $playerId = 0) {
        // проверяем результат и начисляем победы игрокам
        if (self::_isPalindrome($string)) {
            @self::$results[$playerId] += 1;
            return true;
        }

        for($i = 0; $i < mb_strlen($string); $i++) {
            // следующий раунд (выбрасываем один символ и инвертим индекс игрока)
            self::play(self::_removeSymbolWithIndex($string, $i), !$playerId);
        }
    }

    /**
     * Удаляем символ c заданым индексом
     *
     * @param $string
     * @param $symbolIndex
     * @return string
     */
    static private function _removeSymbolWithIndex($string, $symbolIndex) {
        return mb_substr($string, 0, $symbolIndex) . mb_substr($string, mb_strlen($string));
    }

    /**
     * Проверяем или строка это палиндром
     *
     * @param $input
     * @return bool (true — палиндром)
     */
    static private function _isPalindrome($input) {
        // считаем к-во вхождений каждого символа
        $symbols = array();
        for($i=0; $i<mb_strlen($input); $i++) {
            // mb_substr используем для многобайтных кодировок
            @$symbols[mb_substr($input, $i, 1)] += 1;
        }

        // считаем кол-во непарных символов
        $oddCount = 0;
        foreach($symbols as $count) {
            $oddCount += ($count%2) ? 1 : 0;
        }

        // если непарных символов больше чем две, тогда палиндром не получится
        $result = $oddCount<2;

        return $result;
    }
}