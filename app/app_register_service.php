<?php

// register session service provider
$app->register(new \Silex\Provider\SessionServiceProvider(), array(
    'session.storage.options' => array(
        'name' => $config['general']['session']['session_name'],
        'cookie_lifetime' => $config['general']['session']['cookie_lifetime'],
        'cookie_domain' => $config['general']['session']['cookie_domain'],
    ),
));

// register twig service provider
$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => BRO_PROJECT_ROOT_DIR.'/themes/master',
    'twig.option' => array(
        'debug' => true,
        'cache' => BRO_PROJECT_ROOT_DIR.'/apps/cache/twig/',
        'strict_variables' => true,
        'autoescape' => true,
    ),
));

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