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
            $removedSymbolsCounter = 0;
            $length = count($symbols);
            $notPairSymbols = '';

            foreach($symbols as $key => $val) {
                $i++;

                if ($i != $length && $length > 1 && $val % 2 != 0) {

                    for ($y = 0; $y < $val; $y++) {
                        $notPairSymbols .= $key;
                    }
                    $removedSymbolsCounter++;
                } else {
                    if ($i == 1) {
                        for ($y = 0; $y < $val; $y++) {
                            $palindrome .= $key;
                        }
                    } else {
                        $middle = strlen($palindrome) * 0.5;
                        for ($y = 0; $y < $val; $y++) {
                            $palindrome = substr_replace($palindrome, $key, $middle, 0);
                        }
                    }
                }


            }

            $palindromeLength = strlen($palindrome);

            if ($palindromeLength % 2 == 0) {
                $symbols = array();

                foreach (count_chars($notPairSymbols, 1) as $char => $amount) {
                    $symbols[chr($char)] = $amount;
                }

                $length = count($symbols);
                $z = 0;

                foreach($symbols as $key => $val) {
                    $z++;
                    if ($z == $length) {
                        $removedSymbolsCounter--;
                    } else {
                        $val--;
                    }
                    $middle = strlen($palindrome) * 0.5;
                    for ($y = 0; $y < $val; $y++) {
                        $palindrome = substr_replace($palindrome, $key, $middle, 0);
                    }
                }
            }

            if ($removedSymbolsCounter % 2 == 0) {
                return 'First';
            } else {
                return 'Second';
            }
        }
    }

}