<?php

$adminUrl = $config['general']['application']['admin_url'];

$routesDir  = BRO_SRC_DIR."/Application";
$routes = scandir($routesDir);
foreach ($routes as $file){
    if ($file === '.' or $file === '..') continue;
    $ctl = scandir($routesDir . '/' . $file . '/Controller');

    foreach($ctl as $c) {
        if (pathinfo($c, PATHINFO_EXTENSION) === "php"){
            $exploded = explode(".", $c);
            $class = "\\Application\\$file\\Controller\\$exploded[0]";
            new $class($app, $adminUrl);
        }
    }
}
