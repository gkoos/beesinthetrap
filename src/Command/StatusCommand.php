<?php
namespace BeesInTheTrap\Command;

class StatusCommand extends BaseCommand
{
    public function execute()
    {
        print "Current Hive Status:\n";
        $this->game->hive->displayStatus();
        print "\n";
    }
}