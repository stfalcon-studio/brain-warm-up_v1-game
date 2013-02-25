<?php

abstract class BaseGameTest extends \PHPUnit_Framework_TestCase
{
    protected $game;

    const WIN_FIRST  = 'First';
    const WIN_SECOND = 'Second';

    /**
     * Set up
     */
    protected function setUp()
    {
        $this->setUpGame();
    }

    /**
     * Set up game
     */
    abstract protected function setUpGame();

    /**
     * Test game
     *
     * @param $input
     * @param $expectWin
     *
     * @dataProvider provider
     */
    public function testWhoWillWin($input, $expectWin)
    {
        $win = $this->game->whoWillWin($input);
        $this->assertEquals($win, $expectWin);
    }

    /**
     * Test data provider
     *
     * @return array
     */
    public static function provider()
    {
        $data = [];

        $data[] = [
            ['aba'],
            self::WIN_FIRST
        ];

        $data[] = [
            ['abca'],
            self::WIN_SECOND
        ];

        return $data;
    }


}