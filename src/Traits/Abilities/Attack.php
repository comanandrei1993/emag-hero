<?php

namespace App\Traits\Abilities;

trait Attack
{
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
}