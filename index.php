<?php
require 'vendor/autoload.php';

require 'processes/battle.php';

use App\Entity\Battle;
use App\Entity\Creatures\Player;
use App\Entity\Creatures\WildBeast;

/** @var Player $orderus */
/** @var WildBeast $wildBeast */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!--  BOOTSTRAP  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <!----------------->
</head>
<body>
<div class="container">

    <h1>This is the index.php page</h1>

    <?php require 'templates/main.php' ?>

    <!--    <p>--><?php //battle($orderus, $wildBeast); ?><!--</p>-->

    <p>
        <?php

        $battle = new Battle([$orderus, $wildBeast]);

        $battle->battle($battle->getOpponents());
        ?>
    </p>
</div>
</body>
</html>


