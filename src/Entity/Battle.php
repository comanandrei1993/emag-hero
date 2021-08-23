<?php

namespace App\Entity;

use App\Entity\Creatures\Player;

class Battle
{
    private $opponents;

    /**
     * @param $opponents
     */
    public function __construct($opponents)
    {
        $this->opponents = $opponents;
    }


    /**
     * @return mixed
     */
    public function getOpponents()
    {
        return $this->opponents;
    }

    /**
     * @param mixed $opponents
     */
    public function setOpponents($opponents)
    {
        $this->opponents = $opponents;
    }

    public function battle($opponents) {
        if ($opponents[0]->compareStats($opponents[1]) == $opponents[0]) {
            $first = $opponents[0];
            $second = $opponents[1];
        } else {
            $first = $opponents[1];
            $second = $opponents[0];
        }

        $countTurns = 0;

        while (
            $first->getHealth() != 0 &&
            $second->getHealth() != 0
        ) {
            $second->takeDamage($first, $first->attack($second));
            $first->takeDamage($second, $second->attack($first));

            if ($countTurns == 20) {
                echo "It's a draw!\n";
                return;
            }

            $countTurns++;
        }

        if ($first->getHealth() <= 0) {
            echo 'Winner is ' . $second->getName();
        } else {
            echo 'Winner is ' . $first->getName();
        }
    }
}