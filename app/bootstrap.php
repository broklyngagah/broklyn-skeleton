<?php

// defined path
if(!defined('BRO_PROJECT_ROOT_DIR')) {
    define('BRO_PROJECT_ROOT_DIR', dirname(__DIR__));
    define('BRO_CONFIG_DIR', BRO_PROJECT_ROOT_DIR . '/app/config');
    define('BRO_SRC_BROKLYN_DIR', BRO_PROJECT_ROOT_DIR . '/src/broklyn');
    define('BRO_WEB_DIR', BRO_PROJECT_ROOT_DIR.'/web');
}

require_once BRO_PROJECT_ROOT_DIR . '/vendor/autoload.php';
require_once BRO_SRC_BROKLYN_DIR . '/Library/Helper.php';

$config = getConfig();

// instant the application
$app = new Broklyn\Application();
$app['debug'] = $config['general']['application']['debug'];

/*
$app->get('/dbal/select', function() use ($app){
    $sql = 'select * from user';
    $query = $app['db']->prepare($sql);
    $query->execute();

    return $app['twig']->render('/dbal/select.twig', array(
        'users' => $query->fetchAll(\PDO::FETCH_CLASS),
    ));
});
*/

require_once __DIR__ . '/app_register_service.php';
require_once __DIR__ . '/app_register_bundle.php';





