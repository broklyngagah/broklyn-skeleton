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
require_once BRO_SRC_BROKLYN_DIR . '/Library/Helper.php';

$config = getConfig();

// instant the application
$app = new Broklyn\Application();
$app['debug'] = $config['general']['application']['debug'];

require_once __DIR__ . '/app_register_service.php';
require_once __DIR__ . '/app_register_controller.php';

//managing errors
$app->error(function (\Exception $e, $code) use ($app) {
    $app['monolog']->addInfo($e->getMessage());
    $app['monolog']->addInfo($e->getTraceAsString());
    switch ($code) {
        case 404:
            $message = "Resource not found.";
            break;
        case 401:
            $message = "Unauthorized.";
            break;
        default:
            $message = "Internal server error.";
    }
    return $app->json(array("statusCode"=>$code, "message" => $message));
});

return $app;




