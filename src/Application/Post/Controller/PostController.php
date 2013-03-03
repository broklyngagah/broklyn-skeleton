<?php

namespace Application\Post\Controller;

use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response;

use Broklyn\Library\Util;

class PostController extends \Broklyn\Controller
{

    protected $bundle='post';

    public function initialize()
    {
        $this->app->match($this->urlResolver . '/', array($this, 'index'))
            ->bind('post_index')
        ;
    }

    public function index(Request $req)
    {
        return $this->render('post/view.twig');
    }

}