<?php

namespace Fre5h\Helper;

/**
 * Palindrome Helper
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class Palindrome
{
    /**
     * Check if text is palindrome
     *
     * @param string $text Text to check
     *
     * @return bool
     */
    public function isPalindrome($text)
    {
        return $text == strrev($text);
    }

    /**
     * Check if palindrome can be made from some letters
     *
     * @param string $text Text to check
     *
     * @return bool
     */
    public function canBePalindrome($text)
    {
        $result = true;

        // Even
        if (strlen($text) % 2 === 0) {
            // Analyze stats of used letters
            foreach (count_chars($text, 1) as $count) {
                if ($count % 2 !== 0) {
                    $result = false;
                    break;
                }
            }
        // Odd
        } else {
            $singleLetterUsed = false;

            // Analyze stats of used letters
            foreach (count_chars($text, 1) as $count) {
                if ($count % 2 !== 0) {
                    if ($singleLetterUsed) {
                        $result = false;
                        break;
                    } else {
                        $singleLetterUsed = true;
                    }
                }
            }
        }

        return $result;
    }
}
