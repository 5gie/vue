<?php

namespace app\controllers;

use app\models\Lists;
use app\system\App;
use app\system\Controller;
use app\system\middlewares\AuthMiddleware;

class ListsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        try {

            $auth = new AuthMiddleware;
            $auth->execute();
            
        } catch (\Exception $e) {

            $this->response->setStatusCode(403);
            $this->json([
                'error' => $e->getMessage()
            ]);
            exit;

        }
    }

    public function create()
    {

        $lists = new Lists;
        $alert = '';

        if ($this->request->post()) {

            $lists->data($this->request->body());

            $lists->user_id = App::$app->user->id;

            if($lists->validate() && $lists->save()) $this->response->setStatusCode(201);

        }

        return $this->json([
            'error' => $lists->getFirstError(),
            'alert' => $alert,
            'list' => $lists
        ]);

    }

}