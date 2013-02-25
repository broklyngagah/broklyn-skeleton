<?php

namespace Broklyn;

use Silex\Application as BaseApplication;
use Silex\Application\UrlGeneratorTrait,
    Silex\Application\TwigTrait,
    Silex\Application\MonologTrait;

class Application extends BaseApplication
{
    public function __construct(array $values = array())
    {
        $values['broklyn_version'] = '1.0.0';
        $values['broklyn_name'] = 'pieter lelaona';

        parent::__construct($values);
    }
}