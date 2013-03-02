<?php

namespace Application\City\Controller;

class DefaultController extends \Broklyn\Controller
{

    protected $bundle='city';

    public function initialize()
    {
        $this->app->match($this->urlResolver.'/', array($this, 'index'))
            ->bind('city_index');
    }

    public function index()
    {
        return new \Symfony\Component\HttpFoundation\Response('ini city index (front)');
    }

}