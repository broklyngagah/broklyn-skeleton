<?php

$_SERVER['SCRIPT_NAME'] = str_replace(
    '/web/' . basename(__FILE__),
    '/' . basename(__FILE__),
    $_SERVER['SCRIPT_NAME']
);

umask(0000);


// defined path
if(!defined('BRO_PROJECT_ROOT_DIR')) {
    define('BRO_PROJECT_ROOT_DIR', dirname(__DIR__));
    define('BRO_CONFIG_DIR', BRO_PROJECT_ROOT_DIR . '/app/config');
    define('BRO_SRC_DIR', BRO_PROJECT_ROOT_DIR . '/src');
    define('BRO_SRC_BROKLYN_DIR', BRO_SRC_DIR . '/broklyn');
    define('BRO_WEB_DIR', BRO_PROJECT_ROOT_DIR.'/web');
}

require_once BRO_PROJECT_ROOT_DIR . '/vendor/autoload.php';
require_once BRO_SRC_BROKLYN_DIR . '/Library/util.php';
require_once BRO_SRC_BROKLYN_DIR . '/Helper/helper.php';

$config = getConfig();

require_once __DIR__ . '/app.php';

//echo '<pre>', var_dump($app['controllers']), '<pre>'; die;

return $app;




