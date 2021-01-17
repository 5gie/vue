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

            return $this->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function create()
    {

        $lists = new Lists;
        $alert = '';

        if ($this->request->post()) {

            $lists->data($this->request->body());

            if($lists->validate()) $lists->save();

        }

        return $this->json([
            'error' => $lists->getFirstError(),
            'alert' => $alert,
            'list' => $lists
        ]);

    }

}