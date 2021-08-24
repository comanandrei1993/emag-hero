<?php
namespace Tests\Unit;

use App\Entity\Creatures\Player;
use App\Entity\Creatures\WildBeast;
use PHPUnit\Framework\TestCase;

class PlayerDealsDamageTest extends TestCase {
    public function testDealDamage() {
        $wildBeast = new WildBeast();
        $wildBeast->setLuck(0);
        $wildBeast->setDefence(0);

        $orderus = new Player();
        $orderus->setStrength(100);

        $result = $orderus->attack($wildBeast);

        $this->assertEquals(100, $result);
    }
}