<?php

namespace Application\City\Controller;

use Symfony\Component\HttpFoundation\Response,
    Symfony\Component\HttpFoundation\Request;

class AdminCityController extends \Broklyn\Controller
{
    protected $bundle = 'city';

    public function initialize()
    {
        $this->app->match($this->urlResolver."/", array($this, 'index'))
            ->method('GET')
            ->bind('admin_city_index');

        $this->app->match($this->urlResolver."/edit/{id}/", array($this, 'edit'))
            ->assert('id', '\d*')
            ->method('GET|POST')
            ->bind('admin_city_edit');
    }

    public function index(Request $req)
    {
        return new Response($req);
    }

    public function edit($id=0)
    {
        var_dump($this->app['request']->getBaseUrl());
        return new Response('ini method edit di city admin controller');
    }

}
