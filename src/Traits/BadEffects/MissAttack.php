<?php

namespace App\Traits\BadEffects;

use App\Entity\BattleLog;

trait MissAttack
{
    public function missAttack($defendant)
    {
        if(rand(1, 100) <= $defendant->getLuck()) {
            BattleLog::addToLog($this->getName().' misses their attack!');
            return true;
        } else {
            return false;
        }
    }
}