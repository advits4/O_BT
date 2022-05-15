<html>
    <head>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <?php if ($msg) { ?>Hitting has started: <strong><?php echo $msg; ?></strong> <?php } ?>
        </br>  </br>    
        Total Queen bee left: <?php echo $totalQueenBees; ?> | Total Queen points left:  <?php echo $queenPoints; ?>
        </br>
        Total Worker bees left: <?php echo $totalWorkerBees; ?> | Total Worker points left:  <?php echo $workerPoints; ?>
        </br>
        Total Drone bees left: <?php echo $totalDroneBees; ?> | Total Drone points left:  <?php echo $dronePoints; ?>
        </br></br>
        Is Queen dead: <?php echo $isQueenDead; ?>
        </br>
        Are all Workers dead: <?php echo $areWorkersDead; ?>
        </br>
        Are all Drones dead: <?php echo $areDronesDead; ?>
        </br></br>
        <form method="post" action="">
            <input type="submit" value="<?php echo $submitBtn; ?>">
        </form>
    </body>
</html>