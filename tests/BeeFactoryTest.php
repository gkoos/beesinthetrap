<?php

use PHPUnit\Framework\TestCase;
use BeesInTheTrap\Bee\BeeFactory;

final class BeeFactoryTest extends TestCase
{
    /**
     * @var BeeFactory
     */
    protected $beeFactory;

    public function setUp(): void
    {
        $beeData = [
            "Worker" => [
                "number" => 5,
                "hp" => 75,
                "damage" => 10,
                "killEmAll" => false
            ],
            "Drone" => [
                "number" => 5,
                "hp" => 50,
                "damage" => 12,
                "killEmAll" => false
            ]
        ];

        $this->beeFactory = new BeeFactory($beeData);
    }

    public function testInstance()
    {
        $bee = $this->beeFactory->create("Worker");
        $this->assertInstanceOf("BeesInTheTrap\\Bee\\BaseBee", $bee);
    }

    public function testUnknownBeeType()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Unknown bee type");
        $bee = $this->beeFactory->create("Unknown");
    }

    public function testBeeName()
    {
        $bee = $this->beeFactory->create("Worker");
        $this->assertEquals("Worker", $bee->getName());
    }

    public function testBeeHP()
    {
        $bee = $this->beeFactory->create("Worker");
        $this->assertEquals(75, $bee->getHP());
    }
}