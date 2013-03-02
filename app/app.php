<?php

// instant the application
$app = new Broklyn\Application();
$app['debug'] = (bool)$config['general']['application']['debug'];

// register session service provider
$app->register(new \Silex\Provider\SessionServiceProvider(), array(
    'session.storage.options' => array(
        'name' => $config['general']['session']['session_name'],
        'cookie_lifetime' => $config['general']['session']['cookie_lifetime'],
        'cookie_domain' => $config['general']['session']['cookie_domain'],
    ),
));

// register twig service provider
$cfg[] = BRO_WEB_DIR.'/themes/'.$config['general']['themes_name']['theme_admin'];
$cfg[] = BRO_WEB_DIR.'/themes/'.$config['general']['themes_name']['theme_front'];
$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.class_path' => BRO_PROJECT_ROOT_DIR.'/vendor/twig/lib',
    'twig.path' => $cfg,
    'twig.option' => array(
        'debug' => true,
        'charset' => 'utf-8',
        'cache' => dirname(__DIR__) . 'cache',
        'strict_variables' => false,
        'autoescape' => true,
    ),
));
// Add the Broklyn Twig functions, filters and tags.
$app['twig']->addExtension(new \Broklyn\Twig\TwigExtension($app));
$app['twig']->addTokenParser(new \Broklyn\Twig\SetContentTokenParser());
$loader = new Twig_Loader_String();
$app['twig.loader']->addLoader($loader);

//echo '<pre>', var_dump(dirname(__DIR__) . '/cache/'), '<pre>'; die;

// register monolog service provider
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/logs/development.log',
));


// register doctrine service provider
$app->register(new \Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => $config['general']['database']['database_driver'],
        'dbname'   => $config['general']['database']['database_name'],
        'host'     => $config['general']['database']['database_host'],
        'user'     => $config['general']['database']['database_user'],
        'password' => $config['general']['database']['database_password'],
    ),
));

// register httpCache service provider
$app->register(new \Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__.'/cache',
));

$app->register(new \Silex\Provider\ServiceControllerServiceProvider()); // register ServiceControllerServiceProvider
$app->register(new \Silex\Provider\SwiftmailerServiceProvider()); // register swift mailer service provider
$app->register(new \Silex\Provider\UrlGeneratorServiceProvider()); // register urlGeneratorService
$app->register(new \Silex\Provider\FormServiceProvider());

require_once __DIR__ . '/app_register_controller.php';

//managing errors
/*
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
*/