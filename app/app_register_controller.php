<?php

$adminUrl = $config['general']['application']['admin_url'];

// get from admin post controller
$app->mount($adminUrl . '/post', new \Application\Post\Controller\AdminPostController()); // post admin controller

//new \Application\City\Controller\AdminCityController($app, $config);