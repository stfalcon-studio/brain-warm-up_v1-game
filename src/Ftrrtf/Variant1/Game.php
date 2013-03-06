<?php

namespace Ftrrtf\Variant1;

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

        do {
            $numberOfMoves++;
            $output = $this->playerAction($input);

            // Palindrome found?
            $palindromeFound = strlen($input) == strlen($output);
            // Replace input by last result string
            $input = $output;
        } while(!$palindromeFound);

        return $numberOfMoves % 2 == 0
            ? self::WIN_SECOND
            : self::WIN_FIRST;
    }

    /**
     * Actions of the player:
     *  - calculating the best option
     *  - search palindrome
     *
     * @param $input
     *
     * @return string
     */
    protected function playerAction($input)
    {
        if (strlen($input) <= 1) {
            return $input;
        }

        $lettersFrequency = count_chars($input, 1);

        // Check palindrome
        if ($this->palindromeExist($lettersFrequency)) {
            return $input;
        }

        $letterFrequency = max($lettersFrequency);

        // Remove letter
        $letterPosition = strpos(
            $input,
            // Fetch letter from frequency stat
            chr(array_search($letterFrequency, $lettersFrequency))
        );
        if ($letterPosition !== false) {
            $input = substr_replace($input, '', $letterPosition, 1);
        }

        // Return new string
        return $input;
    }

    /**
     * Check the existence of a palindrome.
     * Simply by the presence of odd/even letter frequency.
     *
     * @param $letterFrequency
     *
     * @return bool
     */
    protected function palindromeExist($letterFrequency)
    {
        $allowedOneOdd = true;
        foreach ($letterFrequency as $letter => $frequency) {
            if ($frequency % 2 != 0) {
                if ($allowedOneOdd) {
                    $allowedOneOdd = false;
                } else {
                    return false;
                }
            }
        }

        return true;
    }

}