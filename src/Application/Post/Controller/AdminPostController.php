<?php

namespace Application\Post\Controller;

class AdminPostController extends \Broklyn\Controller
{

    protected $bundle='post';

    public function initialize()
    {
        $this->app->match($this->urlResolver.'/', array($this, 'index'))
            ->bind('admin_post_index');
    }

    public function index()
    {
        echo '<pre>', var_dump('ini Post controller (admin)'), '<pre>'; die;
    }

}
