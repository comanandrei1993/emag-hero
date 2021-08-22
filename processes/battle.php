<?php

function battle($opp1, $opp2)
{
    if ($opp1->compareStats($opp2) == $opp1) {
        $first = $opp1;
        $second = $opp2;
    } else {
        $first = $opp2;
        $second = $opp1;
    }

    $countTurns = 0;

    while (
        $first->getHealth() != 0 &&
        $second->getHealth() != 0
    ) {
        $second->takeDamage($first, $first->attack($second->getDefence()));
        $first->takeDamage($second, $second->attack($first->getDefence()));

        if ($countTurns == 20) {
            echo "It\'s a draw!\n";
        }

        $countTurns++;
    }

    if ($first->getHealth() <= 0) {
        echo 'Winner is ' . $second->getName();
    } else {
        echo 'Winner is ' . $first->getName();
    }
}

?>