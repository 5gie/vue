<?php

namespace app\system;

use app\config\ConfigRoutes;

class App 
{
    
    public static string $ROOT_DIR;

    public string $layout = 'main';
    public static App $app;
    public ConfigRoutes $router;
    public Database $db;
    public View $view;
    public ?UserModel $user;
    public string $secret;

    public function __construct($root, array $config, $run)
    {

        self::$ROOT_DIR = $root;
        self::$app = $this;
       
        $this->db = new Database($config['db']);
        $this->secret = $config['SECRET_KEY'];

        if($run) $this->router = new ConfigRoutes;

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