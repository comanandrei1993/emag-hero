<?php

namespace App\Entity\Creatures;

use App\Core\BaseCreature;
use App\Inerfaces\Abilities\Attack;
use App\Inerfaces\Abilities\MagicShield;
use App\Inerfaces\Abilities\RapidStrike;
use App\Inerfaces\BadEffects\TakeDamage;

class Player extends BaseCreature implements Attack, TakeDamage, RapidStrike, MagicShield
{
    private $name;

    public function __construct()
    {
        parent::__construct(
            rand(70, 100), // Health
            rand(70, 80),  // Strength
            rand(45, 55),  // Defence
            rand(40, 50),  // Speed
            rand(10, 30)   // Luck
        );

        $this->name = 'Orderus';
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

//    public function attack($defDefence, $defLuck)
//    {
//        if($this->missAttack($defLuck)) {
//            return 0;
//        }
//        return $this->rapidStrike($defDefence);
//    }

    public function attack($attacker)
    {
        if($this->missAttack($attacker->getLuck())) {
            return 0;
        }
        return $this->rapidStrike($attacker->getDefence());
    }

    public function rapidStrike($defDefence)
    {
        if (rand(1, 100) < 11) {
            if (($this->getStrength() - $defDefence) * 2 > 0) {
                echo "Orderus' lightning reflexes allow him to strike twice!\n";
                return ($this->getStrength() - $defDefence) * 2;
            } else {
                return 0;
            }
        } else {
            if ($this->getStrength() - $defDefence > 0) {
                return $this->getStrength() - $defDefence;
            } else {
                return 0;
            }
        }
    }

    public function takeDamage($attacker, $dmg)
    {
        $this->magicShield($attacker, $dmg);
    }

    public function magicShield($attacker, $dmg)
    {
        if (rand(1, 100) < 21) {
            $dmg = $dmg / 2;
            $this->setHealth($this->getHealth() - $dmg);
            echo "Orderus' magic shield protects him and halves the damage taken!\n";
            echo $attacker->getName() . " attacks " . $this->getName() . " for " . $dmg . " damage!\n";
            $this->checkIfDead();
        } else {
            $this->setHealth($this->getHealth() - $dmg);
            echo $attacker->getName() . " attacks " . $this->getName() . " for " . $dmg . " damage!\n";
            $this->checkIfDead();
        }
    }
}