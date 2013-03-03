<?php

namespace Application\User\Controller;

use Symfony\Component\HttpFoundation\Response;
use Broklyn\Library\Util;

class AdminLoginController extends \Broklyn\Controller
{

    protected $bundle='user';

    public function initialize()
    {
        $this->app->match($this->urlResolver . '/login/', array($this, 'index'))
            ->bind('admin_user_login');
    }

    public function index()
    {
        return new Response(Util::var_dump('ini login admin'));
    }
}