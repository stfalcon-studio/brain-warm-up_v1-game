<?php

namespace Fluxuator;

use Fluxuator\Helpers\UTF8;

/**
 * Class Fluxuator\Game
 *
 * @package Brain_WarmUp_Test_Suite
 * @author  Andrii Shkodiak <fluxuator@stfalcon.com>
 */
class Game
{
    /**
     * @var Players
     */
    protected $players;

    /**
     * Class constructor.
     *
     * @param array $players
     */
    public function __construct(array $players)
    {
        // Initialize multibyte power
        UTF8::init();

        // Involve 2 players into the game
        $this->players = new Players($players);
    }

    /**
     * Start to play that game and find out who will be a winner!
     *
     * @param string $input
     *
     * @return string
     */
    public function whoWillWin($input)
    {
        $player = $this->players->getCurrentPlayer();

        if ($this->isPalindromeOrCouldBe($input)) {

            // We have the winner!
            return $player;
        }

        $letterUsageHits = UTF8::countLetters($input);
        // Sort letters by the descending hits - odd then even [5, 3, 1, 4, 2]
        uasort(
            $letterUsageHits,
            function ($letterHitA, $letterHitB) {
                return ($letterHitB % 2 == $letterHitA % 2)
                    ? ($letterHitB - $letterHitA)
                    : ($letterHitB % 2 != 0);
            }
        );

        $numOfAvailableMoves = count($letterUsageHits);
        while ($numOfAvailableMoves) {
            $numOfAvailableMoves--;

            // Get the first letter from the set and remove it from the input string
            $letterToRemove = key($letterUsageHits);
            array_shift($letterUsageHits);
            $input = str_replace($letterToRemove, '', $input);

            if ($numOfAvailableMoves) {
                // Next move
                $player = $this->players->nextPlayer();
                if ($this->isPalindromeOrCouldBe($input)) {
                    // We have the winner!
                    break;
                }
            }
        }

        return $player;
    }

    /**
     * Checks whether the string is a palindrome or could become it or not
     *
     * @param string $input
     *
     * @return bool
     */
    protected function isPalindromeOrCouldBe($input)
    {
        if ($input == strrev($input)) {
            // The input string is a palindrome, so get out of here
            return true;
        }

        // Try to guess if a palindrome is could be there
        $possiblePalindrome = false;
        foreach (UTF8::countLetters($input) as $hits) {
            if ($hits % 2) {
                if (isset($hasOddLetters)) {
                    // A palindrome can have at most one odd numbered letter (in the middle of the string)
                    return false;
                }
                $hasOddLetters = true;
            } else {
                $possiblePalindrome = true;
            }
        }

        return $possiblePalindrome;
    }
}