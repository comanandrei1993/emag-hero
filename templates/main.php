<?php
/////////////// CLASSES /////////////////////
// Player Class
/** @var Player $orderus */
use App\Entity\Player;

// WildBeast Class
/** @var WildBeast $wildBeast */
use \App\Entity\WildBeast;

////////////// END OF CLASSES //////////////

$orderus = new Player();
$wildBeast = new WildBeast();
?>

<div class="row">
    <div class="col-6">
        <h1 class="text-center"><?php echo $orderus->getName() ?></h1>
    </div>

    <div class="col-6">
        <h1 class="text-center"><?php echo $wildBeast->getName() ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">Stats Names</th>
                <th scope="col">Stats Values</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th scope="row">Health</th>
                <td><?php echo $orderus->getHealth() ?></td>
            </tr>

            <tr>
                <th scope="row">Strength</th>
                <td><?php echo $orderus->getStrength() ?></td>
            </tr>

            <tr>
                <th scope="row">Defence</th>
                <td><?php echo $orderus->getDefence() ?></td>
            </tr>

            <tr>
                <th scope="row">Speed</th>
                <td><?php echo $orderus->getSpeed() ?></td>
            </tr>

            <tr>
                <th scope="row">Luck</th>
                <td><?php echo $orderus->getLuck() ?></td>
            </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-4"></div>

            <div class="col-4">
                <button class="btn btn-warning">
                    Next turn
                </button>
            </div>

            <div class="col-4"></div>
        </div>
    </div>

    <div class="col-6">

        <table class="table table-danger table-striped">
            <thead>
            <tr>
                <th scope="col">Stats Names</th>
                <th scope="col">Stats Values</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <th scope="row">Health</th>
                <td><?php echo $wildBeast->getHealth() ?></td>
            </tr>

            <tr>
                <th scope="row">Strength</th>
                <td><?php echo $wildBeast->getStrength() ?></td>
            </tr>

            <tr>
                <th scope="row">Defence</th>
                <td><?php echo $wildBeast->getDefence() ?></td>
            </tr>

            <tr>
                <th scope="row">Speed</th>
                <td><?php echo $wildBeast->getSpeed() ?></td>
            </tr>

            <tr>
                <th scope="row">Luck</th>
                <td><?php echo $wildBeast->getLuck() ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
