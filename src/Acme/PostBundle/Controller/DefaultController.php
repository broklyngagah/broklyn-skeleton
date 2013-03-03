<?php

namespace Acme\PostBundle\Controller;

use Jazz\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $res = $this->get('request')->getMethod();
        return new Response($res);
    }

}