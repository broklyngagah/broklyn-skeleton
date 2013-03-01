<?php
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

define('ADMIN_THEMES', BRO_WEB_DIR . '/themes/' . $config['general']['themes_name']['theme_admin']);

// instant the application
$app = new Broklyn\Application();
$app['debug'] = $config['general']['application']['debug'];

require_once __DIR__ . '/app.php';

return $app;




