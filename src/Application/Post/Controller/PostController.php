<?php

namespace Application\Post\Controller;

use Symfony\Component\HttpFoundation\Response,
    Symfony\Component\HttpFoundation\Request;

class PostController extends \Broklyn\Controller
{
    protected $bundle = 'post';

    public function initialize()
    {
        $this->app->match($this->urlResolver.'/{year}/', array($this, 'index'))
            ->method('GET')
            ->assert('year', '\d*')
            ->bind('post_index');
        $this->app->match($this->urlResolver.'/{year}/{month}/', array($this, 'index'))
            ->method('GET')
            ->assert('year', '\d*')
            ->assert('month', '\d*')
            ->bind('post_index');
        $this->app->match($this->urlResolver.'/{year}/{month}/{slug}', array($this, 'index'))
            ->method('GET')
            ->assert('year', '\d*')
            ->assert('month', '\w*')
            ->assert('slug', '\w*')
            ->bind('post_index');
    }

    public function index()
    {
        $year=$this->app['request']->get('year');
        $month=$this->app['request']->get('month');
        $slug=$this->app['request']->get('slug');

        echo '<pre>', var_dump('year: '.$year, 'month: '.$month, 'slug: '.$slug), '<pre>'; die;
    }

}