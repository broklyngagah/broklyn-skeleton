<?php

namespace Application\Post\Controller;

use Symfony\Component\HttpFoundation\Response;

class PostController extends \Broklyn\Controller
{
    protected $bundle = 'post';

    public function initialize()
    {
        $this->app->match($this->urlResolver.'/', array($this, 'index'))
            ->method('GET')
            ->bind('post_index');
    }

    public function index()
    {
        echo '<pre>', var_dump('post front'), '<pre>'; die;
    }
}