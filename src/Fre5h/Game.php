<?php

namespace Fre5h;

/**
 * Game
 *
 * @author Artem Genvald <genvaldartem@gmail.com>
 */
class Game
{
    const FIRST  = 'First';
    const SECOND = 'Second';

    /**
     * @var Player First player
     */
    protected $firstPlayer;

    /**
     * @var Player Second player
     */
    protected $secondPlayer;

    /**
     * @var Player Current player
     */
    protected $currentPlayer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->firstPlayer  = new Player(self::FIRST);
        $this->secondPlayer = new Player(self::SECOND);

        $this->currentPlayer = $this->firstPlayer;
    }

    /**
     * Determine the winner
     *
     * @param string $text Input string
     *
     * @return string
     */
    public function whoWillWin($text)
    {
        $text = $this->currentPlayer->processText($text);

        while (!$this->currentPlayer->stopTheGameIAmWinner()) {
            $this->switchCurrentPlayer();
            $text = $this->currentPlayer->processText($text);
        }

        return $this->currentPlayer->getName();
    }

    /**
     * Switch a current player
     */
    protected function switchCurrentPlayer()
    {
        switch ($this->currentPlayer->getName()) {
            case self::FIRST:
                $this->currentPlayer = $this->secondPlayer;
                break;
            case self::SECOND:
                $this->currentPlayer = $this->firstPlayer;
                break;
        }
    }
}
