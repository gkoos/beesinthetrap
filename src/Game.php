<?php
namespace BeesInTheTrap;

use BeesInTheTrap\Command;

class Game
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var int
     */
    public $hits = 0;

    /**
     * @var Hive
     */
    public $hive;

    /**
     * @var Command\BaseCommand[]
     */
    protected $commands;

    public function __construct()
    {
        $this->config = $this->readConfig();
    }

    public function run()
    {
        $this->initGame();
        $this->playGame();
        $this->exitGame();
    }

    public function readConfig()
    {
        return json_decode(file_get_contents("./src/config.json"), true);
    }

    protected function initGame()
    {
        $this->hits = 0;

        $this->hive = new Hive($this->config["bees"]);

        $this->commands = $this->initCommands();

        print "BEES IN THE TRAP\n";
        $this->commands["help"]->execute();
        $this->commands["status"]->execute();
    }

    protected function initCommands()
    {
        return [
            "hit" => new Command\HitCommand($this),
            "status" => new Command\StatusCommand($this),
            "help" => new Command\HelpCommand($this),
            "exit" => new Command\ExitCommand($this)
        ];
    }

    protected function playGame()
    {
        // main loop
        while (1) {
            print "Command:";
            $line = readline();
            $command = strtolower($line);

            if (isset($this->commands[$command])) {
                $this->commands[$command]->execute();

                // check if after the last successful command there are bees alive in the hive
                if (!$this->hive->numBeesAlive) {
                    return;
                }
            }
            else {
                print "Unknown command!\n";
            }
        }
    }

    protected function exitGame()
    {
        print "Game Over. The hive was destroyed in {$this->hits} hits";
    }
}