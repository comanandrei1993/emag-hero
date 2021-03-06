<?php

namespace App\Entity;

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
            BattleLog::addToLog($second->getName()."'s remaining HP is: ".$second->getHealth());
            $first->takeDamage($second, $second->attack($first));
            BattleLog::addToLog($first->getName()."'s remaining HP is: ".$first->getHealth());

            if ($countTurns == 20) {
                BattleLog::addToLog("It's a draw!\n");
                return;
            }

            $countTurns++;
        }

        if ($first->getHealth() <= 0) {
            BattleLog::addToLog('Winner is ' . $second->getName());
        } else {
            BattleLog::addToLog('Winner is ' . $first->getName());
        }
    }
}