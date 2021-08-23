<?php

namespace App\Entity\Creatures;

use App\Core\BaseCreature;
use App\Inerfaces\Abilities\Attack;
use App\Inerfaces\BadEffects\TakeDamage;

class WildBeast extends BaseCreature implements Attack, TakeDamage
{
    private $name;

    public function __construct()
    {
        parent::__construct(
            rand(60, 90),  // Health
            rand(40, 60),  // Strength
            rand(40, 60),  // Defence
            rand(40, 60),  // Speed
            rand(25, 40)   // Luck
        );

        $this->name = 'Wild Beast';
    }


    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function attack($defendant)
    {
        if($this->missAttack($defendant->getLuck())) {
            return 0;
        }

        if ($this->getStrength() - $defendant->getDefence() > 0) {
            return $this->getStrength() - $defendant->getDefence();
        } else {
            return 0;
        }
    }

    public function takeDamage($attacker, $dmg)
    {
        $this->setHealth($this->getHealth() - $dmg);
        echo $attacker->getName() . " attacks " . $this->getName() . " for " . $dmg . " damage!\n";
        $this->checkIfDead();
    }


}