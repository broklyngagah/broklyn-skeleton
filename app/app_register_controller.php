<?php

$adminUrl = $config['general']['application']['admin_url'];

$routesDir  = BRO_SRC_DIR."/Application";
$routes = scandir($routesDir);
foreach ($routes as $file){
    if ($file === '.' or $file === '..') continue;
    $dir = $routesDir . '/' . $file . '/Controller';
    if(!is_dir($dir)) continue;

    $ctl = scandir($dir);

    if(!empty($ctl)) {
        foreach($ctl as $c) {
            if (pathinfo($c, PATHINFO_EXTENSION) === "php"){
                $exploded = explode(".", $c);
                $class = "\\Application\\$file\\Controller\\$exploded[0]";

                $admin = $exploded[0];

                if(preg_match('/Admin/', $admin)) {
                    new $class($app, $adminUrl);
                } else {
                    new $class($app, "");
                }
            }
        }
    }
}
