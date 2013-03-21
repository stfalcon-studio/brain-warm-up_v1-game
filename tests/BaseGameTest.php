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
        // $data[n] in CLI = Game::testWhoWillWin with data set #n
        $data[0] = [
            'a',
            self::WIN_FIRST
        ];

        $data[1] = [
            'ab',
            self::WIN_SECOND
        ];

        $data[2] = [
            'zz',
            self::WIN_FIRST
        ];

        $data[3] = [
            'aba',
            self::WIN_FIRST
        ];

        $data[4] = [
            'abca',
            self::WIN_SECOND
        ];

        $data[5] = [
            'aabb',
            self::WIN_FIRST
        ];

        $data[6] = [
            'abacaba',
            self::WIN_FIRST
        ];

        $data[7] = [
            'abazaba',
            self::WIN_FIRST
        ];

        $data[8] = [
            'aassddxyz',
            self::WIN_FIRST
        ];

        $data[9] = [
            'aabc',
            self::WIN_SECOND
        ];

        $data[10] = [
            'abcabc',
            self::WIN_FIRST
        ];

        $data[11] = [
            'aaabbbccdd',
            self::WIN_SECOND
        ];

        $data[12] = [
            'aabbcccc',
            self::WIN_FIRST
        ];

        $data[13] = [
            'gevqgtaorjixsxnbcoybr',
            self::WIN_FIRST
        ];

        $data[14] = [
            'xvhtcbtouuddhylxhplgjxwlo',
            self::WIN_FIRST
        ];

        $data[15] = [
            'ctjxzuimsxnarlciuynqeoqmmbqtagszuo',
            self::WIN_SECOND
        ];

        $data[16] = [
            'abcdefghijklmnopqrstuvwxyz',
            self::WIN_SECOND
        ];

        $data[17] = [
            'desktciwoidfuswycratvovutcgjrcyzmilsmadzaegseetexygedzxdmorxzxgiqhcuppshcsjcozkopebegfmxzxxagzwoymlghgjexcgfojychyt',
            self::WIN_FIRST
        ];

        $data[18] = [
            'vnvtvnxjrtffdhrfvczzoyeokjabxcilmmsrhwuakghvuabcmfpmblyroodmhfivmhqoiqhapoglwaluewhqkunzitmvijaictjdncivccedfpaezcnpwemlohbhjjlqsonuclaumgbzjamsrhuzqdqtitygggsnruuccdtxkgbdd',
            self::WIN_FIRST
        ];

        $data[19] = [
            'hxueikegwnrctlciwguepdsgupguykrntbszeqzzbpdlouwnmqgzcxejidstxyxhdlnttnibxstduwiflouzfswfikdudkazoefawm',
            self::WIN_SECOND
        ];

        $data[20] = [
            'aaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbccccccccccccccccccccddddddddddeeeeeeeeeeffffgggghhhhiiiijjjjqqqqwwwweeeerrrrttttyyyyuuuuiiiiooooppppaaaassssddddffffgggghhhhjjjjkkkkllllzzzzxxxxccccvvvvbbbbnnnnmmmm',
            self::WIN_FIRST
        ];

        return $data;
    }

}