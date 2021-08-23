<?php

namespace App\Entity\Creatures;

use App\Core\BaseCreature;
use App\Entity\Battle;
use App\Entity\BattleLog;
use App\Inerfaces\Abilities\MagicShield;
use App\Inerfaces\Abilities\RapidStrike;

class Player extends BaseCreature implements  RapidStrike, MagicShield
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

    public function attack($defendant)
    {
        if($this->missAttack($defendant)) {
            return 0;
        }

        return $this->rapidStrike($defendant);
    }

    public function rapidStrike($defendant)
    {
        if (rand(1, 100) < 11) {
            if($this->missAttack($defendant)) {
                return 0;
            }

            if (($this->getStrength() - $defendant->getDefence()) * 2 > 0) {
                BattleLog::addToLog( "Orderus' lightning reflexes allow him to strike twice!\n");
                return ($this->getStrength() - $defendant->getDefence()) * 2;
            } else {
                return 0;
            }
        } else {
            if ($this->getStrength() - $defendant->getDefence() > 0) {
                return $this->getStrength() - $defendant->getDefence();
            } else {
                return 0;
            }

//            parent::attack($defendant);
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
            BattleLog::addToLog("Orderus' magic shield protects him and halves the damage taken!\n");
            BattleLog::addToLog($attacker->getName() . " attacks " . $this->getName() . " for " . $dmg . " damage!\n");
            $this->checkIfDead();
        } else {
            parent::takeDamage($attacker, $dmg);
        }
    }
}