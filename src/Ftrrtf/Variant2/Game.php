<?php

namespace Ftrrtf\Variant2;

class Game {

    const WIN_FIRST  = 'First';
    const WIN_SECOND = 'Second';

    /**
     * The gameplay
     *
     * @param $input
     *
     * @return string
     */
    public function whoWillWin($input)
    {
        $numberOfMoves = 0;
        $lettersFrequency = count_chars($input, 1);
        $length = strlen($input);

        for ($i = 0; $i <= $length; $i++) {
            $numberOfMoves += array_pop($lettersFrequency) % 2;
        }

        return $numberOfMoves % 2 == 1 || $numberOfMoves == 0
            ? self::WIN_FIRST
            : self::WIN_SECOND;
    }
}