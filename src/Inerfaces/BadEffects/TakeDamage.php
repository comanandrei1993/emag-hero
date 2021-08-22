<?php

namespace App\Inerfaces\BadEffects;

interface TakeDamage
{
    public function takeDamage($attacker, $dmg);
}