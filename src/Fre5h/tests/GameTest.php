<?php

namespace Fre5h;

/**
 * Class GameTest
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class GameTest extends \BaseGameTest
{
    /**
     * @var \Fre5h\Game
     */
    protected $game;

    /**
     * Set up game
     */
    protected function setUpGame()
    {
        $this->game = new Game();
    }
}
