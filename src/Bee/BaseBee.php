<?php
namespace BeesInTheTrap\Bee;

class BaseBee
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $hp;

    /**
     * @var int
     */
    protected $damage;

    /**
     * @var boolean
     */
    protected $killEmAll;

    public function __construct(string $name, int $hp, int $damage, bool $killEmAll = false)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->damage = $damage;
        $this->killEmAll = $killEmAll;
    }

    public function hit()
    {
        $this->hp -= $this->damage;

        if ($this->hp < 0) {
            $this->hp = 0;
        }
    }

    public function kill()
    {
        $this->hp = 0;
    }

    public function getHP()
    {
        return $this->hp;
    }

    public function isAlive()
    {
        return $this->hp > 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDamage()
    {
        return $this->damage;
    }

    public function getKillEmAll()
    {
        return $this->killEmAll;
    }
}