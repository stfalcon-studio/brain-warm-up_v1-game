<?php

namespace Fluxuator;

/**
 * Class Fluxuator\GameTest
 *
 * @package Brain_WarmUp_Test_Suite
 * @author  Andrii Shkodiak <fluxuator@stfalcon.com>
 */
class GameTest extends \BaseGameTest
{
    /**
     * Set-up game
     *
     * @return void
     */
    protected function setUpGame()
    {
        $this->game = new Game([
            'First',
            'Second'
        ]);
    }
}