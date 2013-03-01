<?php

namespace Broklyn;

use Broklyn\Library\Util;
use Broklyn;

class TwigExtension extends \Twig_Extension
{

    private $app;

    public function __construct(\Silex\Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('printDump', array($this, 'printDump'), array('is_safe' => array('html'))),
        );
    }

    public function printDump($val)
    {
        $output = Util::var_dump($val, true);
        return $output;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'broklyn';
    }
}