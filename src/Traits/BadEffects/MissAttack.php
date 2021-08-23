<?php

namespace App\Traits\BadEffects;

trait MissAttack
{
    public function missAttack($defendant)
    {
        if(rand(1, 100) <= $defendant->getLuck()) {
            echo $this->getName().' misses their attack!';
            return true;
        } else {
            return false;
        }
    }
}