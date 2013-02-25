<?php

namespace Fre5h;

use Fre5h\Helper\Palindrome;

/**
 * Class PalindromeTest
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class PalindromeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Fre5h\Helper\Palindrome
     */
    protected $palindromeHelper;

    /**
     * Set up test
     */
    protected function setUp()
    {
        $this->palindromeHelper = new Palindrome();
    }

    /**
     * Test method isPalindrome
     *
     * @param string $text           Text to check
     * @param string $expectedAnswer Answer
     *
     * @dataProvider isPalindromeProvider
     */
    public function testIsPalindrome($text, $expectedAnswer)
    {
        $answer = $this->palindromeHelper->isPalindrome($text);
        $this->assertEquals($answer, $expectedAnswer);
    }

    /**
     * IsPalindrome provider
     *
     * @return array
     */
    public static function isPalindromeProvider()
    {
        $data[0] = [
            'abba',
            true
        ];

        $data[1] = [
            'abc',
            false
        ];

        $data[2] = [
            'a',
            true
        ];

        return $data;
    }

    /**
     * Test method canBePalindrome
     *
     * @param string $text           Text to check
     * @param string $expectedAnswer Answer
     *
     * @dataProvider canBePalindromeProvider
     */
    public function testCanBePalindrome($text, $expectedAnswer)
    {
        $answer = $this->palindromeHelper->canBePalindrome($text);
        $this->assertEquals($answer, $expectedAnswer);
    }

    /**
     * CanBePalindrome provider
     *
     * @return array
     */
    public static function canBePalindromeProvider()
    {
        $data[0] = [
            'abba',
            true
        ];

        $data[1] = [
            'abc',
            false
        ];

        $data[2] = [
            'a',
            true
        ];

        $data[3] = [
            'abbba',
            true
        ];

        $data[4] = [
            'abcba',
            true
        ];

        $data[5] = [
            'abcde',
            false
        ];

        $data[6] = [
            'abcdedcb',
            false
        ];

        $data[6] = [
            'aabbccdef',
            false
        ];

        return $data;
    }
}
