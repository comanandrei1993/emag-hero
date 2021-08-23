<?php
namespace Tests\Unit;

use App\Entity\Creatures\Player;
use App\Entity\Creatures\WildBeast;
use PHPUnit\Framework\TestCase;

class Defendant100LuckTest extends TestCase {
    public function testMissAttack() {
        $wildBeast = new WildBeast();
        $wildBeast->setLuck(100);
        $wildBeast->setDefence(0);

        $orderus = new Player();
        $orderus->setStrength(50);

        $result = $orderus->attack($wildBeast);

        $this->assertEquals(0, $result);
    }
}