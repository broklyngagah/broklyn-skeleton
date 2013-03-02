<?php

require_once __DIR__ .'/../app/bootstrap.php';

//echo '<pre>', var_dump($app['controllers']), '<pre>'; die;

if ($app['debug']) {
    $app->run();
}
else{
    $app['http_cache']->run();
}