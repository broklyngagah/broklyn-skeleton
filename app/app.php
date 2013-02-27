<?php

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