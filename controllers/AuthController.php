<?php

namespace app\controllers;

use app\system\Controller;
use app\models\User;
use app\models\Login;
use \Firebase\JWT\JWT;

class AuthController extends Controller
{

    public function __construct(){

        parent::__construct();

    }

    public function login()
    {

        $login = new Login;
        $alert = '';

        if($this->request->post()){

            $login->data($this->request->body());

            if($login->validate() && $login->login()){

                $key = "example_key";
                $jwt = JWT::encode($login, $key);

                setcookie('token', $jwt, time() + 86400, '/');

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

        // $user = new User();
        // $session = new Session;
        
        // if ($request->post()) {

        //     $user->data($request->body());

        //     if($user->validate() && $user->save()){

        //         $session->setFlash('success', 'Thank you for registration');
        //         $response->redirect('/');
            
        //     }

        // }

        // // $this->setLayout('auth');

        // return $this->render('auth/register', [
        //     'model' => $user
        // ]);

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
