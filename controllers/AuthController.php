<?php

namespace app\controllers;

use app\system\Controller;
use app\models\User;
use app\models\Login;
use app\system\App;
use \Firebase\JWT\JWT;

class AuthController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {

        $login = new Login;
        $alert = '';

        if($this->request->post()){

            $login->data($this->request->body());

            if($login->validate() && $login->login()){

                $user = [
                    'id' => $login->id,
                    'email' => $login->email,
                    'login' => $login->name
                ];

                $jwt = JWT::encode($user, $this->secret);

                setcookie('token', $jwt, time() + 86400);

                App::$app->login($user);

                $alert = 'Zalogowano pomyslnie';

            }

        } 

        return $this->json([
            'error' => $login->getFirstError(),
            'alert' => $alert,
            'form' => $login->form()
        ]);

    }

    public function register()
    {

        $user = new User;

        $alert = '';
        
        if ($this->request->post()) {

            $user->data($this->request->body());

            if($user->validate() && $user->save()){

                $alert = 'Zarejestrowano pomyślnie.';
            
            }

        }

        return $this->json([
            'error' => $user->getFirstError(),
            'alert' => $alert,
            'form' => $user->form()
        ]);

    }

    public function logout()
    {
        // App::$app->logout();
        // $response->redirect('/');
    }

    public function profile()
    {
        // return $this->render('account/profile');
    }

}
