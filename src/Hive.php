<?php
namespace BeesInTheTrap;

use BeesInTheTrap\Bee\BaseBee;
use BeesInTheTrap\Bee\BeeFactory;

class Hive
{
    /**
     * @var BaseBee[]
     */
    protected $bees;

    /**
     * @var int
     */
    public $numBeesAlive;

    public function __construct(array $beeData)
    {
        $this->bees = $this->createBees($beeData);
        $this->numBeesAlive = count($this->bees);
    }

    protected function createBees(array $beeData)
    {
        $beeFactory = new BeeFactory($beeData);

        $bees = [];

        foreach($beeData as $name=>$data) {
            $num = $data["number"];
            for ($i=0; $i<$num; $i++) {
                $bees[] = $beeFactory->create($name);
            }
        }

        return $bees;
    }

    public function displayStatus()
    {
        foreach ($this->bees as $bee) {
            $isAlive = $bee->isAlive() ? "Alive" : "Dead";
            print "{$bee->getName()}: {$bee->getHP()}HP - $isAlive\n";
        }
    }

    public function hitRandomBee()
    {
        $num = rand(0, count($this->bees) - 1);
        $bee = $this->bees[$num];

        $isAliveBeforeHit = $bee->isAlive();
        $bee->hit();
        $isAliveAfterHit = $bee->isAlive();

        print "Direct Hit. You took {$bee->getDamage()} hit points from a {$bee->getName()} bee\n";

        // if we hit a living bee dead then decrease the number of living bees
        if ($isAliveBeforeHit && !$isAliveAfterHit) {
            $this->numBeesAlive--;
        }

        // if we killed a queen kill all the bees
        if (!$isAliveAfterHit && $bee->getKillEmAll()) {
            $this->killAllBees();
        }
    }

    public function killAllBees()
    {
        foreach ($this->bees as $bee) {
            $bee->kill();
        }

        $this->numBeesAlive = 0;
    }
}