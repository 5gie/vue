<?php

namespace app\system;

use app\config\ConfigRoutes;
use Firebase\JWT\JWT;

class App 
{
    
    public static string $ROOT_DIR;

    public string $layout = 'main';
    public static App $app;
    public ConfigRoutes $router;
    public Database $db;
    public View $view;
    public $user;
    public string $secret;

    public function __construct($root, array $config, $run)
    {

        self::$ROOT_DIR = $root;
        self::$app = $this;
       
        $this->db = new Database($config['db']);
        $this->secret = $config['SECRET_KEY'];

        if(!$this->user && isset($_COOKIE['token'])){

            try {

                $this->user = JWT::decode($_COOKIE['token'], $this->secret, array('HS256')) ?? false;

            } catch (\Exception $e){

                debug($e->getMessage());
                exit;
                
            }
        };

        if($run) $this->router = new ConfigRoutes;
        
    }

    public function login($user)
    {
        $this->user = $user;
    }

    // public function logout()
    // {
    //     $this->user = null;
    //     $this->session->remove('user');
    // }

    public static function isGuest()
    {
        return !self::$app->user;
    }

}