<?php

session_start();

// An auto-loader to include classes when they are actually called.
// Usually not needed in small applications like this but it is a good approach instead of using include() directly.
// Since the class will be included only if they are ever called.
function appAutoloadClass($class) {
    $class = $class . '.php';
    // to include root folder as well as "classes" folder class
    include file_exists($class) ? $class : 'classes' . DIRECTORY_SEPARATOR . $class;
} 
spl_autoload_register('appAutoloadClass');

//instantiating and injecting all the dependencies
$queen = new Queen;
$worker = new Worker;
$drone = new Drone;
$hive = new Hive($queen, $worker, $drone);

$hive->generateView();
?>