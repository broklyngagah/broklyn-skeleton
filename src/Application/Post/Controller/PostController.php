<?php

namespace Application\Post\Controller;

class PostController extends \Broklyn\Controller
{

    protected $bundle='post';

    public function initialize()
    {
        $this->app->match($this->urlResolver . '/', array($this, 'index'))
            ->bind('post_index');
    }

    public function index()
    {
        echo '<pre>', var_dump('ini post index (front)'), '<pre>'; die;
    }

}