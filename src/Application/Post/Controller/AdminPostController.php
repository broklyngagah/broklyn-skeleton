<?php

namespace Application\Post\Controller;

use Silex;
use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;

class AdminPostController extends \Broklyn\Controller
{

    protected $bundle = 'post';

    public function initialize()
    {
        $this->app->match($this->urlResolver."/", array($this, 'index'))
            ->method( "GET")
            ->bind('admin_post_index');

        $this->app->match($this->urlResolver . "/edit/{id}", array($this, 'edit'))
            ->method('GET')
            ->assert('id', '\d*')
            ->bind('admin_post_edit');
    }

    public function index()
    {
        return new Response('ini admin post controller method index()');
    }

    public function create()
    {

    }

    public function edit($id=0)
    {
        return new Response('ini post controller method edit ');
    }

    public function delete($id=0)
    {

    }

}