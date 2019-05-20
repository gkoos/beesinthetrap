<?php
namespace BeesInTheTrap\Command;

use BeesInTheTrap\Game;

abstract class BaseCommand
{
    /**
     * @var Game
     */
    protected $game;

    /**
     * BaseCommand constructor
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    abstract public function execute();
}