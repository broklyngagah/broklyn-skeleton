<?php

// get from admin post controller
$app->mount($config['general']['application']['admin_url'] . '/post', new \Application\Post\Controller\AdminPostController());