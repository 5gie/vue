<?php
namespace app\config;

use app\controllers\SiteController;
use app\controllers\AuthController;

abstract class Routes
{
    protected array $routes = [];
    protected string $namespace = '';

    public function define()
    {

        // $this->get('*', [SiteController::class, 'home']);
        $this->setNamespace('/api');
        $this->get('/test', [SiteController::class, 'test']);
        $this->get('/contact', [SiteController::class, 'contact']);
        $this->post('/contact', [SiteController::class, 'contact']);
        $this->get('/login', [AuthController::class, 'login']);
        $this->post('/login', [AuthController::class, 'login']);
        $this->get('/register', [AuthController::class, 'register']);
        $this->post('/register', [AuthController::class, 'register']);
        $this->get('/logout', [AuthController::class, 'logout']);
        $this->get('/profile', [AuthController::class, 'profile']);

        return $this->routes;

    }

    public function get($path, $callback)
    {

        $this->routes['get'][$this->namespace . $path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$this->namespace . $path] = $callback;
    }

    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

}