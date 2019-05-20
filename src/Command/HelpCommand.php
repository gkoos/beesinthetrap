<?php
namespace BeesInTheTrap\Command;

class HelpCommand extends BaseCommand
{
    public function execute()
    {
        print <<<TXT
Destroy the hive
Available Commands:
hit: hit the hive
status: shows the status of the bees in the hive
help: displays this help text
exit: exit game immediately

TXT;
    }
}