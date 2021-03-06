<?php

namespace Broklyn;

use Silex,
    Silex\Application as broklynApp;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    protected $app;
    protected $bundle;
    protected $urlResolver;

    public function __construct(BroklynApp $app, $adminUrl='')
    {
        $this->app = $app;
        $this->urlResolver =  '' === $adminUrl ? "/".$this->bundle : "/".$adminUrl."/".$this->bundle;

        $this->initialize();
    }

    /**
     * twig rendering template
     *
     * @param string $file
     * @param array $data
     * @return mixed
     */
    protected function render($file='', array $data=array())
    {
        return $this->app['twig']->render($file, $data);
    }

    /**
     * Initialize class router like constructor
     *
     * @return mixed
     */
    abstract public function initialize();

}

