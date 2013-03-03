<?php

namespace Application\User\Controller;

use Symfony\Component\HttpFoundation\Response;

class AdminUserController extends  \Broklyn\Controller
{

    protected $bundle='user';

    public function initialize()
    {
        $this->app->match($this->urlResolver . '/', array($this, 'index'))
            ->bind('admin_user_index');
    }

    public function index()
    {
        $user =$this->app['request']->getMethod();
        return new Response(\Broklyn\Library\Util::var_dump($user));
    }
}
