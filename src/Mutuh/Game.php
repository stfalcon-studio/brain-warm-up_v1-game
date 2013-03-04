<?php

namespace Mutuh;

class Game {

    public function whoWillWin($input)
    {
        $reversedInput = strrev($input);

        if($input == $reversedInput) {
            return 'First';
        } else {
            //TODO finish

            $symbols = array();

            foreach (count_chars($input, 1) as $char => $amount) {
                $symbols[chr($char)] = $amount;
            }

            array_multisort($symbols, SORT_DESC);
            print_r($symbols);
        }

        return 'First';
    }

}