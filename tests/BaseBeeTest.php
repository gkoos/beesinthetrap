<?php

use PHPUnit\Framework\TestCase;
use BeesInTheTrap\Bee\BaseBee;

final class BaseBeeTest extends TestCase
{
    public function testName()
    {
        $bee = new BaseBee("Bee", 50, 10);
        $this->assertEquals("Bee", $bee->getName());
    }

    public function testHP()
    {
        $bee = new BaseBee("Bee", 50, 10);
        $this->assertEquals(50, $bee->getHP());
    }

    public function testDamage()
    {
        $bee = new BaseBee("Bee", 50, 10);
        $this->assertEquals(10, $bee->getDamage());
    }

    public function testIsAlive()
    {
        $bee = new BaseBee("Bee", 50, 10);
        $this->assertEquals(true, $bee->isAlive());
    }

    public function testKill()
    {
        $bee = new BaseBee("Bee", 50, 10);
        $bee->kill();
        $this->assertEquals(false, $bee->isAlive());
    }

    public function testHit()
    {
        $bee = new BaseBee("Bee", 50, 10);
        $bee->hit();
        $this->assertEquals(40, $bee->getHP());
    }

    public function testHitDead()
    {
        $bee = new BaseBee("Bee", 15, 10);
        $bee->hit();
        $bee->hit();
        $this->assertEquals(0, $bee->getHP());
        $this->assertEquals(false, $bee->isAlive());
    }

    public function testKillEmAll()
    {
        $bee = new BaseBee("Bee", 15, 10, true);
        $this->assertEquals(true, $bee->getKillEmAll());
    }
}