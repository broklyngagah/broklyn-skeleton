<?php

namespace Application\Post\Controller;

use Silex,
    Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;

class AdminPostController implements ControllerProviderInterface
{

    /**
     * @param \Silex\Application $app
     * @return \Silex\ControllerCollection
     */
    public function connect(\Silex\Application $app)
    {
        $ctr = $app['controllers_factory'];

        $ctr->match("/", array($this, 'post'))
            ->bind('post_index');

        $ctr->match("/create", array($this, 'create'))
            ->bind('post_create');

        return $ctr;
    }

    public function post(Silex\Application $app)
    {
        var_dump('ini admin post controller !');
        return false;
    }

    public function create(Silex\Application $app, Request $req)
    {
        var_dump('POST' === $req->getMethod());
        return false;
    }



}