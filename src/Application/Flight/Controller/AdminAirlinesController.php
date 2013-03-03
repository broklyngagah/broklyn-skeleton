<?php

namespace Application\Flight\Controller;

use Application\Flight\Model\AirlinesModel;


class AdminAirlinesController extends \Broklyn\Controller
{

    protected $bundle = 'airlines';

    public function initialize()
    {
        $this->app->match($this->urlResolver."/", array($this, 'index'))
            ->method('GET')
            ->bind('admin_airlines_index');
    }

    public function index()
    {

        $user = AirlinesModel::getAirlines($this->app);
        return self::render('flight/airlines.index.twig', array(
            'users' => $user,
        ));
    }




}