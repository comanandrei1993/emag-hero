<?php

namespace App\Traits\BadEffects;

use App\Entity\BattleLog;

trait TakeDamage
{
    public function takeDamage($attacker, $dmg)
    {
        $this->setHealth($this->getHealth() - $dmg);
        BattleLog::addToLog($attacker->getName() . " attacks " . $this->getName() . " for " . $dmg . " damage!\n");
        $this->checkIfDead();
    }
}