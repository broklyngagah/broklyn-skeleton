<?php

namespace Application\Post\Controller;

use Silex,
    Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;
use Application\Post\Model\CityModel;


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
        $user = CityModel::getUserData($app);

        return $app['twig']->render('test.html', array(
            'users' => CityModel::getUserData($app)
        ));
    }

    public function create(Silex\Application $app, Request $req)
    {

        var_dump($req->getMethod());
        return false;
    }



}