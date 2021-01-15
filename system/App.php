<?php

namespace app\system;
use Bramus\Router\Router;

class App 
{
    
    public static string $ROOT_DIR;

    public string $layout = 'main';
    public static App $app;
    public Router $router;
    public Database $db;
    public View $view;
    public ?UserModel $user;
    public string $secret;

    public function __construct($root, array $config)
    {

        self::$ROOT_DIR = $root;
        self::$app = $this;
        $this->router = new Router;
        $this->db = new Database($config['db']);
        $this->secret = $config['secret_key'];

        // $primaryValue = $this->session->get('user');
        // if($primaryValue){
        //     $primaryKey = $this->userClass::primaryKey();
        //     $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        // } else {
        //     $this->user = null;
        // }

        $this->run();

    }

    public function run()
    {
        $this->router->setNamespace('app\controllers');

        $this->router->mount('/api', function(){

            $this->router->get('/contact', 'SiteController@contact');
            $this->router->post('/contact', 'SiteController@contact');
            $this->router->get('/login', 'AuthController@login');
            $this->router->post('/login', 'AuthController@login');
            $this->router->get('/register', 'AuthController@register');
            $this->router->post('/register', 'AuthController@register');
            $this->router->get('/logout', 'AuthController@logout');
            $this->router->get('/profile', 'AuthController@profile');

        });

        $this->router->run();

        // try{
            
        // } catch(\Exception $e){
        //     $this->response->setStatusCode($e->getCode());
        //     echo $this->controller->render('error', [
        //         'exception' => $e
        //     ]);
        // }

    }


    // public function login(UserModel $user)
    // {
    //     $this->user = $user;
    //     $primaryKey = $user->primaryKey();
    //     $primaryValue = $user->{$primaryKey};
    //     $this->session->set('user', $primaryValue);
    //     return true;
    // }

    // public function logout()
    // {
    //     $this->user = null;
    //     $this->session->remove('user');
    // }

    // public static function isGuest()
    // {
    //     return !self::$app->user;
    // }

}