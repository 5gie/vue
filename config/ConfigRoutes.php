<?php
namespace app\config;

use Bramus\Router\Router;

class ConfigRoutes
{
    public function __construct()
    {
        $router = new Router;

        $router->setNamespace('app\controllers');

        $router->mount('/api', function () use ($router) {

            $router->get('/contact', 'SiteController@contact');
            $router->post('/contact', 'SiteController@contact');
            $router->get('/login', 'AuthController@login');
            $router->post('/login', 'AuthController@login');
            $router->get('/register', 'AuthController@register');
            $router->post('/register', 'AuthController@register');
            $router->get('/logout', 'AuthController@logout');

            $router->mount('/profile', function () use ($router) {
                
                $router->before('GET|POST', '/.*', 'MiddlewareController@profile');
                $router->get('/', 'AuthController@profile');

            });


        });

        return $router->run();
    }
}