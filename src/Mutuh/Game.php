<?php

namespace Mutuh;

class Game {

    public function whoWillWin($input)
    {
        $reversedInput = strrev($input);

        if($input == $reversedInput) {
            return 'First';
        } else {

            $symbols = array();

            foreach (count_chars($input, 1) as $char => $amount) {
                $symbols[chr($char)] = $amount;
            }

            array_multisort($symbols, SORT_DESC);

            $palindrome = '';

            $i = 0;
            $length = count($symbols);

            foreach($symbols as $key => $val) {
                $i++;

                if ($i != $length && $length > 1) {
                    if ($val % 2 != 0) {
                        $val--;
                    }
                }

                if ($i == 1) {
                    for ($y = 0; $y < $val; $y++)
                    $palindrome .= $key;
                } else {
                    $middle = strlen($palindrome) * 0.5;
                    for ($y = 0; $y < $val; $y++)
                    $palindrome = substr_replace($palindrome, $key, $middle, 0);
                }
            }

            var_dump($i);
            var_dump($palindrome);

            if ($i % 2 == 0) {
                var_dump('First');
                return 'First';
            } else {
                var_dump('Second');
                return 'Second';
            }
        }
    }

}