<?php

namespace Fluxuator;

/**
 * Class Fluxuator\Players
 *
 * @package Brain_WarmUp_Test_Suite
 * @author  Andrii Shkodiak <fluxuator@stfalcon.com>
 */
class Players
{
    /**
     * @var array Available players
     */
    protected $available;

    /**
     * Class constructor
     *
     * @param array $players
     */
    public function __construct(array $players)
    {
        $this->available = $players;
    }

    /**
     * Get the current player of the current game.
     *
     * @return string
     */
    public function getCurrentPlayer()
    {
        return current($this->available);
    }

    /**
     * Passes move in the game to the next player. If current player is the last in the list,
     * then move is passing to the first player.
     *
     * @return array
     */
    public function nextPlayer()
    {
        if (false === next($this->available)) {
            reset($this->available);
        }

        return $this->getCurrentPlayer();
    }
}