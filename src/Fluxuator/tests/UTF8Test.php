<?php

namespace Fluxuator;

use Fluxuator\Helpers\UTF8;

/**
 * Class Fluxuator\UTF8Test
 *
 * @package Brain_WarmUp_Test_Suite
 * @author  Andrii Shkodiak <fluxuator@stfalcon.com>
 */
class UTF8Test extends \PHPUnit_Framework_TestCase
{

    /**
     * Data provider for the testCountLetters
     *
     * @return array
     */
    public static function testCountLettersProvider()
    {
        $data[0] = [
            'a',
            [
                'a' => 1
            ]
        ];

        $data[1] = [
            'aaaaa',
            [
                'a' => 5
            ]
        ];

        $data[2] = [
            'abacadbcbd',
            [
                'a' => 3,
                'b' => 3,
                'c' => 2,
                'd' => 2,
            ]
        ];

        $data[3] = [
            'українська',
            [
                'у' => 1,
                'к' => 2,
                'р' => 1,
                'а' => 2,
                'ї' => 1,
                'н' => 1,
                'с' => 1,
                'ь' => 1
            ]
        ];

        $data[4] = [
            '',
            []
        ];

        return $data;
    }

    /**
     * Data provider for the testStrLen
     *
     * @return array
     */
    public static function testStrLenProvider()
    {
        $data[0] = [
            'a',
            1
        ];

        $data[1] = [
            'aaaaa',
            5
        ];

        $data[2] = [
            'українська',
            10
        ];
        $data[3] = [
            '',
            0
        ];

        return $data;
    }

    /**
     * Test UTF8::countLetters() method
     *
     * @param string $input
     * @param array  $expected
     *
     * @dataProvider testCountLettersProvider
     */
    public function testCountLetters($input, $expected)
    {
        $this->assertEquals(UTF8::countLetters($input), $expected);
    }

    /**
     * Test UTF8::strlen() method
     *
     * @param string $input
     * @param array  $expected
     *
     * @dataProvider testStrLenProvider
     */
    public function testStrLen($input, $expected)
    {
        $this->assertEquals(UTF8::strlen($input), $expected);
    }

    /**
     * Set up
     */
    protected function setUp()
    {
        UTF8::init();
    }
}