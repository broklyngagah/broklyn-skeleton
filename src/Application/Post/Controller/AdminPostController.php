<?php

namespace Application\Post\Controller;

use Silex,
    Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraint as assert;
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

        $ctr->match("/", array($this, 'index'))
            ->bind('post_index');

        $ctr->match("/create", array($this, 'create'))
            ->bind('post_create')
            ->method('GET|POST');

        $ctr->match("/edit/{id}", array($this, 'edit'))
            ->assert('id', '\d*')
            ->bind('post_edit')
            ->method('GET|POST');

        return $ctr;
    }

    /**
     * @param \Silex\Application $app
     * @return mixed
     */
    public function index(Silex\Application $app)
    {
        $user = CityModel::getUserData($app);
        return $app['twig']->render('post/index.twig', array(
            'users' => $user,
        ));
    }

    public function create(Silex\Application $app, Request $req)
    {
        if('POST' === $req->getMethod()) {
            return new Response($req->get('title'));
        }

        return $app['twig']->render('post/create.twig');
    }

    public function edit($id=0, Silex\Application $app, Request $req)
    {

    }



}