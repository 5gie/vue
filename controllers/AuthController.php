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

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {

        $loginForm = new LoginForm;
        if($request->post()){

            $loginForm->data($request->body());
            if($loginForm->validate() && $loginForm->login()){

                $response->redirect('/');
                return;
            }
        }
        // $this->setLayout('auth');

        return $this->render('auth/login', [
            'model' => $loginForm
        ]);

    }

    public function register(Request $request, Response $response)
    {

        $user = new User();
        $session = new Session;
        
        if ($request->post()) {

            $user->data($request->body());

            if($user->validate() && $user->save()){

                $session->setFlash('success', 'Thank you for registration');
                $response->redirect('/');
            
            }

        }

        // $this->setLayout('auth');

        return $this->render('auth/register', [
            'model' => $user
        ]);

    }

    public function logout(Request $request, Response $response)
    {
        App::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('account/profile');
    }

}
