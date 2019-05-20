<?php
namespace BeesInTheTrap\Command;

class HitCommand extends BaseCommand
{
    public function execute()
    {
        $this->game->hive->hitRandomBee();
        $this->game->hits++;
    }
}