<?php

namespace app\system;

use app\config\Routes;
use app\system\exceptions\NotFoundException;

class Router extends Routes
{
    public Request $request;
    public Response $response;

    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
    }
    
    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->define()[$method][$path] ?? false;

        if(!$callback) include_once App::$ROOT_DIR . "/views/public/index.html";
        else{

            if (is_array($callback)) {

                $controller = new $callback[0];
                App::$app->controller = $controller;
                $controller->action = $callback[1];
                $callback[0] = $controller;

                foreach ($controller->getMiddlewares() as $middleware) $middleware->execute();
            }
            return call_user_func($callback, $this->request, $this->response);
        }

    }


}