<?php
namespace Tests\Unit;

use App\Entity\Battle;
use App\Entity\Creatures\Player;
use App\Entity\Creatures\WildBeast;

class BattleTest extends \PHPUnit\Framework\TestCase {
    public function testMissAttack() {
        $wildBeast = new WildBeast();
        $wildBeast->setLuck(100);
        $wildBeast->setStrength(20);
        $wildBeast->setHealth(100);

        $orderus = new Player();
        $orderus->setLuck(50);
        $orderus->setStrength(100);
        $orderus->setHealth(100);

        $result = $orderus->attack($wildBeast);

        $this->assertEquals(0, $result);
    }
}