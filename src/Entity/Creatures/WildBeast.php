<?php

namespace App\Entity\Creatures;

use App\Core\BaseCreature;

class WildBeast extends BaseCreature
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
}