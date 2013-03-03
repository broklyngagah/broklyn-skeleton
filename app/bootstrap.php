<?php

if(!defined('BRO_PROJECT_ROOT_DIR')) {
    define('BRO_PROJECT_ROOT_DIR', dirname(__DIR__));
    define('BRO_CONFIG_DIR', BRO_PROJECT_ROOT_DIR . '/app/config');
    define('BRO_SRC_DIR', BRO_PROJECT_ROOT_DIR . '/src');
    define('BRO_SRC_BROKLYN_DIR', BRO_SRC_DIR . '/broklyn');
    define('BRO_WEB_DIR', BRO_PROJECT_ROOT_DIR.'/web');
}

use Jazz\Application;


require_once __DIR__ . '/../vendor/autoload.php';
require_once BRO_SRC_BROKLYN_DIR . '/Helper/helper.php';

$config = getConfig();
$app = new \Jazz\Application(BRO_PROJECT_ROOT_DIR, true);

$cfg[] = BRO_WEB_DIR.'/themes/'.$config['general']['themes_name']['theme_admin'];
$cfg[] = BRO_WEB_DIR.'/themes/'.$config['general']['themes_name']['theme_front'];
$app->inject(array(
    'routing.resource' => 'app/config/routing.yml',
    'routing.options' => array(
        'cache_dir' => $app['root_dir'] . '/app/cache/routing',
    ),
    'twig.path' => $cfg,
));







/*

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

return $app;

*/


