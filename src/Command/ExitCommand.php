<?php
namespace BeesInTheTrap\Command;

class ExitCommand extends BaseCommand
{
    public function execute()
    {
        print "Exiting game.\n";
        exit(0);
    }
}