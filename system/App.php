<?php

namespace app\system;

class App 
{
    
    public static string $ROOT_DIR;
    public static App $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;

    public function __construct($root)
    {

        self::$ROOT_DIR = $root;
        self::$app = $this;
        $this->request = new Request;
        $this->response = new Response;
        $this->router = new Router($this->request, $this->response);

    }

    public function run()
    {

        echo $this->router->resolve();

    }

}