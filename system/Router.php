<?php

namespace app\system;

class Router
{
    public Request $request;
    public Response $response;
    public Template $template;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        
        $this->request = $request;
        $this->response = $response;
        $this->template = new Template;

    }
    
    public function get($path, $callback)
    {

        $this->routes['get'][$path] = $callback;

    }
    
    public function post($path, $callback)
    {

        $this->routes['post'][$path] = $callback;

    }

    public function resolve()
    {

        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback) {

            $this->response->setStatusCode(404);

            return $this->template->renderView('404');
        }

        if(is_string($callback)) return $this->template->renderView($callback);
        if(is_array($callback)) {
            App::$app->controller = new $callback[0];
            $callback[0] = App::$app->controller;
        }
        return call_user_func($callback, $this->request);

    }


}