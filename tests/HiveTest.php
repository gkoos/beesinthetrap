<?php

use PHPUnit\Framework\TestCase;
use BeesInTheTrap\Hive;

final class HiveTest extends TestCase
{
    /**
     * @var Hive
     */
    public $hive;

    public function setUp(): void
    {
        $beeData = [
            "Worker" => [
                "number" => 2,
                "hp" => 75,
                "damage" => 10,
                "killEmAll" => false
            ],
            "Drone" => [
                "number" => 3,
                "hp" => 50,
                "damage" => 12,
                "killEmAll" => false
            ]
        ];

        $this->hive = new Hive($beeData);
    }

    public function testNumberOfBees()
    {
        $this->assertEquals(5, $this->hive->numBeesAlive);
    }

    public function testKillAll()
    {
        $this->hive->killAllBees();
        $this->assertEquals(0, $this->hive->numBeesAlive);
    }
}