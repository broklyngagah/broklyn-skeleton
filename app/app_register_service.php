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
    'twig.option' => array(
        'debug' => true,
        'cache' => BRO_PROJECT_ROOT_DIR.'/app/cache/twig',
        'strict_variables' => false,
        'autoescape' => true,
    ),
    'twig.class_path' => BRO_PROJECT_ROOT_DIR.'/vendor/twig/lib',
    'twig.form.templates' => array('form_div_layout.html.twig', 'common/form_div_layout.html.twig'),
    'twig.path' => BRO_PROJECT_ROOT_DIR.'/web/themes/master',
));
// Add the Bolt Twig functions, filters and tags.
$app['twig']->addExtension(new \Broklyn\TwigExtension($app));
$app['twig']->addTokenParser(new \Broklyn\SetcontentTokenParser());

// Add the string loader..x
$loader = new Twig_Loader_String();
$app['twig.loader']->addLoader($loader);



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