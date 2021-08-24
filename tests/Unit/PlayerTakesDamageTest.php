<?php
namespace Tests\Unit;

use App\Entity\Creatures\Player;
use App\Entity\Creatures\WildBeast;
use PHPUnit\Framework\TestCase;

class PlayerTakesDamageTest extends TestCase {
    public function testTakeDamage() {
        $wildBeast = new WildBeast();
        $wildBeast->setStrength(100);

        $orderus = new Player();
        $orderus->setLuck(0);
        $orderus->setDefence(0);

        $result = $wildBeast->attack($orderus);

        $this->assertEquals(100, $result);
    }
}