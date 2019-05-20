<?php
namespace BeesInTheTrap\Bee;

class BeeFactory
{
    protected $beeData;

    public function __construct(array $beeData)
    {
        $this->beeData = $beeData;
    }

    public function create(string $name)
    {
        if (isset($this->beeData[$name])) {
            return new BaseBee($name, $this->beeData[$name]["hp"], $this->beeData[$name]["damage"], $this->beeData[$name]["killEmAll"]);
        }
        else {
            throw new \Exception("Unknown bee type");
        }
    }
}