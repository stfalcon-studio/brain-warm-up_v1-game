<?php

namespace Mutuh;

class Game {

    public function whoWillWin($input)
    {
        $reversedInput = strrev($input);

        // if input value == reversed input value - we are done :)
        if($input == $reversedInput) {
            return 'First';
        } else {

            $symbols = $this->assocArrayOfSymbols($input);

            // string symbols sorting by amount
            array_multisort($symbols, SORT_DESC);

            $palindrome = '';

            $symbolsCount = 0;
            $removedSymbolsCounter = 0;
            $symbolsAmount = count($symbols);
            $notPairSymbols = '';

            foreach($symbols as $symbolValue => $currentSymbolAmount) {
                $symbolsCount++;

                if ($symbolsCount != $symbolsAmount && $symbolsAmount > 1 && $currentSymbolAmount % 2 != 0) {
                    // array of not pair symbols. i will use it later
                    for ($notPairSymbolsCount = 0; $notPairSymbolsCount < $currentSymbolAmount; $notPairSymbolsCount++) {
                        $notPairSymbols .= $symbolValue;
                    }
                    $removedSymbolsCounter++;
                } else {
                    // inserting pair symbols to a center of palindrome output string
                    if ($symbolsCount == 1) {
                        for ($notPairSymbolsCount = 0; $notPairSymbolsCount < $currentSymbolAmount; $notPairSymbolsCount++) {
                            $palindrome .= $symbolValue;
                        }
                    } else {
                        $middle = strlen($palindrome) * 0.5;
                        for ($notPairSymbolsCount = 0; $notPairSymbolsCount < $currentSymbolAmount; $notPairSymbolsCount++) {
                            //inserting to a center of a string
                            $palindrome = substr_replace($palindrome, $symbolValue, $middle, 0);
                        }
                    }
                }


            }

            $palindromeLength = strlen($palindrome);

            // if palindrome string has pair symbols, then we could insert values of the last unpair symbols in the center of a palyndrome string
            // rest of unpair strings amout must be decreased by one
            if ($palindromeLength % 2 == 0) {
                $symbols = $this->assocArrayOfSymbols($notPairSymbols);

                $symbolsAmount = count($symbols);
                $pairSymbolsCount = 0;

                foreach($symbols as $symbolValue => $currentSymbolAmount) {
                    $pairSymbolsCount++;
                    if ($pairSymbolsCount == $symbolsAmount) {
                        $removedSymbolsCounter--;
                    } else {
                        $currentSymbolAmount--;
                    }
                    $middle = strlen($palindrome) * 0.5;
                    for ($notPairSymbolsCount = 0; $notPairSymbolsCount < $currentSymbolAmount; $notPairSymbolsCount++) {
                        $palindrome = substr_replace($palindrome, $symbolValue, $middle, 0);
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

    private function assocArrayOfSymbols($inputString)
    {
        foreach (count_chars($inputString, 1) as $char => $amount) {
            $symbols[chr($char)] = $amount;
        }

        return $symbols;
    }

}