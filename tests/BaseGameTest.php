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

        $data[0] = array(
            'a',
            self::WIN_FIRST
        );

        $data[1] = array(
            'ab',
            self::WIN_SECOND
        );

        $data[2] = array(
            'zz',
            self::WIN_FIRST
        );

        $data[3] = array(
            'aba',
            self::WIN_FIRST
        );

        $data[4] = array(
            'abca',
            self::WIN_SECOND
        );

        $data[5] = array(
            'aabb',
            self::WIN_FIRST
        );

        $data[6] = array(
            'abacaba',
            self::WIN_FIRST
        );

        $data[7] = array(
            'abazaba',
            self::WIN_FIRST
        );

        $data[8] = array(
            'aassddxyz',
            self::WIN_FIRST
        );

        $data[9] = array(
            'aabc',
            self::WIN_SECOND
        );

        $data[10] = array(
            'abcabc',
            self::WIN_FIRST
        );

        $data[11] = array(
            'aaabbbccdd',
            self::WIN_SECOND
        );

        $data[12] = array(
            'aabbcccc',
            self::WIN_FIRST
        );

        $data[13] = array(
            'gevqgtaorjixsxnbcoybr',
            self::WIN_FIRST
        );

        $data[14] = array(
            'xvhtcbtouuddhylxhplgjxwlo',
            self::WIN_FIRST
        );

        $data[15] = array(
            'ctjxzuimsxnarlciuynqeoqmmbqtagszuo',
            self::WIN_SECOND
        );

        $data[16] = array(
            'abcdefghijklmnopqrstuvwxyz',
            self::WIN_SECOND
        );

        $data[17] = array(
            'desktciwoidfuswycratvovutcgjrcyzmilsmadzaegseetexygedzxdmorxzxgiqhcuppshcsjcozkopebegfmxzxxagzwoymlghgjexcgfojychyt',
            self::WIN_FIRST
        );

        $data[18] = array(
            'vnvtvnxjrtffdhrfvczzoyeokjabxcilmmsrhwuakghvuabcmfpmblyroodmhfivmhqoiqhapoglwaluewhqkunzitmvijaictjdncivccedfpaezcnpwemlohbhjjlqsonuclaumgbzjamsrhuzqdqtitygggsnruuccdtxkgbdd',
            self::WIN_FIRST
        );

        $data[19] = array(
            'hxueikegwnrctlciwguepdsgupguykrntbszeqzzbpdlouwnmqgzcxejidstxyxhdlnttnibxstduwiflouzfswfikdudkazoefawm',
            self::WIN_SECOND
        );

        $data[20] = array(
            'aaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbccccccccccccccccccccddddddddddeeeeeeeeeeffffgggghhhhiiiijjjjqqqqwwwweeeerrrrttttyyyyuuuuiiiiooooppppaaaassssddddffffgggghhhhjjjjkkkkllllzzzzxxxxccccvvvvbbbbnnnnmmmm',
            self::WIN_FIRST
        );

        return $data;
    }

}