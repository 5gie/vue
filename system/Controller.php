<?php 

namespace app\system;

// use app\system\middlewares\BaseMiddleware;

// class Controller extends View
class Controller
{
 
    public string $action = '';
    protected array $middlewares = [];
    protected array $flash = [];
    public Request $request;
    public Response $response;
    
    public function __construct(){
        $this->request = new Request;
        $this->response = new Response;
    }

    // public function render($template, $params = [])
    // {

    //     return $this->renderView($template, $params);

    // }

    // public function registerMiddleware(BaseMiddleware $middleware)
    // {

    //     $this->middlewares[] = $middleware;

    // }

    // public function getMiddlewares(): array
    // {
    //     return $this->middlewares;
    // }

    public function json($data)
    {
        header('Content-type: application/json');
        echo json_encode($data);
    }

}