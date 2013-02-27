<?php

namespace Application\Flight\Controller;

use Application\Post\Model\CityModel;

class AdminAirlinesController extends \Broklyn\Controller
{

    protected $bundle = 'airlines';

    /**
     * class for closure constructor
     *
     * @return mixed
     */
    public function initialize()
    {
        $this->app->match("/".$this->adminUrl, array($this, 'index'))
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