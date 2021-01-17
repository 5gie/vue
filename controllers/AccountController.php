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

            return $this->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function profile()
    {

        $lists = Lists::getLists(['user_id' => App::$app->user->id]);

        return $this->json([
            'lists' => $lists
        ]);

    }

}