<?php

namespace app\controllers;

use app\system\Controller;
use app\system\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        $errors = [];
        if($request->post()){
            return 'Handle login data';
        }
        $this->setLayout('auth');
        return $this->render('auth/login');

    }

    public function register(Request $request)
    {

        $errors = [];

        $registerModel = new RegisterModel();
        
        if ($request->post()) {

            $registerModel->data($request->body());

            if($registerModel->validate() && $registerModel->register()){



            }

            // debug($registerModel->errors);

        }

        $this->setLayout('auth');

        return $this->render('auth/register', [
            'model' => $registerModel
        ]);

    }

}
