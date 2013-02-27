<?php

namespace Application\Flight\Controller;

use Application\Post\Model\CityModel;

class AdminAirlinesController extends \Broklyn\Controller
{

    protected $bundle = 'airlines';

    public function initialize()
    {
        $this->app->get($this->urlResolver."/", array($this, 'index'))
            ->method('GET')
            ->bind('admin_airlines_index');
    }

    public function index()
    {
        $user = CityModel::getUserData($this->app);
        return $this->app['twig']->render('post/index.twig', array(
            'users' => $user,
        ));
    }




}