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
        $this->app->match($this->adminUrl, array($this, 'index'))
            ->method( "GET")
            ->bind('admin_post_index');
    }

    public function index()
    {
        return false;
    }

    public function create()
    {

    }

    public function edit($id=0)
    {

    }

    public function delete($id=0)
    {

    }

}