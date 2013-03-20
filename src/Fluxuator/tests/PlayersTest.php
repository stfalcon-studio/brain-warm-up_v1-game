<?php

namespace Fluxuator;

use Fluxuator\Players;

/**
 * Class Fluxuator\PlayersTest
 *
 * @package Brain_WarmUp_Test_Suite
 * @author  Andrii Shkodiak <fluxuator@stfalcon.com>
 */
class PlayersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Players
     */
    protected $players;

    /**
     * Test the current player (the first player)
     */
    public function testCurrentPlayer()
    {
        $this->assertEquals($this->players->getCurrentPlayer(), 1);
    }

    /**
     * Test the next player
     */
    public function testNextPlayer()
    {
        $this->assertEquals($this->players->nextPlayer(), 2);
    }

    /**
     * Test if the returned next player equal to the current one
     */
    public function testNextEqualCurrentPlayer()
    {
        $this->assertEquals($this->players->nextPlayer(), $this->players->getCurrentPlayer());
    }

    /**
     * Test the move from the last to the first player
     */
    public function testFromLastToFirstPlayer()
    {
        $this->players->nextPlayer(); // Player 2
        $this->players->nextPlayer(); // Player 3

        $this->assertEquals($this->players->nextPlayer(), 1);
    }

    /**
     * Set up
     */
    protected function setUp()
    {
        $this->players = new Players([1, 2, 3]);
    }
}