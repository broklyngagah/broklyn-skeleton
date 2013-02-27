<?php

namespace Broklyn;

use Silex,
    Silex\Application as broklyn_controller;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    protected $app;
    protected $bundle;
    protected $adminUrl;

    /**
     * @param \Silex\Application $app
     * @param string $adminUrl
     */
    public function __construct(broklyn_controller $app, $adminUrl='')
    {
        $this->app = $app;
        $this->adminUrl =  '' === $adminUrl ? $this->bundle : $adminUrl . '/' . $this->bundle;
        $this->initialize();
    }

    /**
     * abstract class for closure constructor
     *
     * @return mixed
     */
    abstract public function initialize();

}

