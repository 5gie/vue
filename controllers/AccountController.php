<?php

namespace app\controllers;

use app\models\Lists;
use app\system\App;
use app\system\Controller;
use app\system\middlewares\AuthMiddleware;

class AccountController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        try{

            $auth = new AuthMiddleware;
            $auth->execute();

        } catch(\Exception $e){

            $this->response->setStatusCode(403);
            $this->json([
                'error' => $e->getMessage()
            ]);
            exit;

        }

    }

    public function profile()
    {

        $lists = Lists::findAll(['user_id' => App::$app->user->id], ['id' => 'DESC']);

        return $this->json([
            'lists' => $lists
        ]);

    }

}