<?php

namespace App\Core;

use App\Traits\Abilities\Attack;
use App\Traits\BadEffects\MissAttack;
use App\Traits\BadEffects\TakeDamage;

abstract class BaseCreature
{
    private $health;

    private $strength;

    private $defence;

    private $speed;

    private $luck;

    /**
     * @param $health
     * @param $strength
     * @param $defence
     * @param $speed
     * @param $luck
     */
    public function __construct($health, $strength, $defence, $speed, $luck)
    {
        $this->health = $health;
        $this->strength = $strength;
        $this->defence = $defence;
        $this->speed = $speed;
        $this->luck = $luck;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param mixed $defence
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;
    }

    public function compareStats($opponent) {
        if ($this->getSpeed() > $opponent->getSpeed()) {
            return $this;
        } elseif ($this->getSpeed() < $opponent->getSpeed()) {
            return $opponent;
        } else {
            if ($this->getLuck() > $opponent->getLuck()) {
                return $this;
            } else {
                return $opponent;
            }
        }
    }

    /////////////////////////////
    // Implement Attack Trait //
    ///////////////////////////
    use Attack;

    public function checkIfDead() {
        if ($this->getHealth() < 0) {
            $this->setHealth(0);
        }
    }

    /////////////////////////////////
    // Implement TakeDamage Trait //
    ///////////////////////////////
    use TakeDamage;

    /////////////////////////////////
    // Implement MissAttack Trait //
    ///////////////////////////////
    use MissAttack;
}