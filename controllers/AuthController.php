<?php

namespace app\controllers;

use app\system\Controller;
use app\system\Request;
use app\models\User;
use app\system\App;
use app\models\LoginForm;
use app\system\middlewares\AuthMiddleware;
use app\system\Response;
use app\system\Session;

class AuthController extends Controller
{

    public function __construct(){

        parent::__construct();

    }

    // public function __construct()
    // {
    //     $this->registerMiddleware(new AuthMiddleware(['profile']));
    // }

    public function login()
    {

        $loginForm = new LoginForm;
        if($this->request->post()){

            $loginForm->data($this->request->body());
            if($loginForm->validate() && $loginForm->login()){

        //         $response->redirect('/');
        //         return;
            }
        }
        debug($loginForm->errors);
        exit;

        // $this->setLayout('auth');

        return $this->json([
            // 'model' => $loginForm,
            'status' => 202,
            'data' => [
                'model' => $loginForm
            ]
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
