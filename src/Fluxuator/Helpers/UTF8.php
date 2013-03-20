<?php

namespace Fluxuator\Helpers;

/**
 * Class Fluxuator\Helpers\UTF8
 *
 * @package Brain_WarmUp_Test_Suite
 * @author  Andrii Shkodiak <fluxuator@stfalcon.com>
 */
class UTF8
{
    /**
     * Initialize helper
     */
    public static function init()
    {
        // Set default character encoding
        mb_internal_encoding('UTF-8');
    }

    /**
     * Counts character occurrences in a multibyte string.
     * Equivalent of the count_chars but with multibyte string support.
     *
     * @param string $input Input string
     *
     * @return array
     */
    public static function countLetters($input)
    {
        $lettersSet   = [];
        $stringLength = self::strlen($input);
        for ($i = 0; $i < $stringLength; $i++) {
            $char = mb_substr($input, $i, 1);
            if (!isset($lettersSet[$char])) {
                $lettersSet[$char] = 0;
            }
            $lettersSet[$char]++;
        }

        return $lettersSet;
    }

    /**
     * Counts length of a multibyte string
     *
     * @param string $input
     *
     * @return int
     */
    public static function strlen($input)
    {
        return mb_strlen($input);
    }
}