<?php

namespace App\Traits\BadEffects;

trait TakeDamage
{
    public function takeDamage($attacker, $dmg)
    {
        $this->setHealth($this->getHealth() - $dmg);
        echo $attacker->getName() . " attacks " . $this->getName() . " for " . $dmg . " damage!\n";
        $this->checkIfDead();
    }
}