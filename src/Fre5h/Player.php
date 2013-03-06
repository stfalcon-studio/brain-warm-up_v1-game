<?php

namespace Fre5h;

use Fre5h\Helper\Palindrome;

/**
 * Player
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class Player
{
    /**
     * @var string Name of the current user
     */
    protected $name;

    /**
     * @var Helper\Palindrome Palindrome helper
     */
    protected $palindromeHelper;

    /**
     * @var bool Flag that current user is winner
     */
    protected $iAmWinner = false;

    /**
     * Constructor
     *
     * @param string $name Name of a player
     */
    public function __construct($name)
    {
        $this->name             = $name;
        $this->palindromeHelper = new Palindrome();
    }

    /**
     * Get the name of player
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * User say that he is a winner and game is over
     *
     * @return bool
     */
    public function stopTheGameIAmWinner()
    {
        return $this->iAmWinner;
    }

    /**
     * Process the text
     *
     * @param string $text Text to process
     *
     * @return string
     */
    public function processText($text)
    {
        if ($this->palindromeHelper->isPalindrome($text)
            || $this->palindromeHelper->canBePalindrome($text)
        ) {
            $this->iAmWinner = true;

            return $text;
        } else {
            return $this->removeLetterFromText($text);
        }
    }

    /**
     * Remove a letter from text and return new version of text
     *
     * @param string $text
     *
     * @return string
     */
    protected function removeLetterFromText($text)
    {
        $charsStats = count_chars($text, 1); // Get stats of chars in text
        arsort($charsStats); // Most frequent chars on the top

        $letterToDelete = chr(array_keys($charsStats)[0]); // Find letter that should be deleted (most frequent)

        $letterPosition = strpos($text, $letterToDelete); // Find position of the letter in text

        return substr_replace($text, '', $letterPosition, 1); // Remove the letter from text
    }
}
