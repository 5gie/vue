<?php

namespace app\controllers;

use app\models\Lists;
use app\models\Tasks;
use app\system\App;
use app\system\Controller;
use app\system\middlewares\AuthMiddleware;

class TasksController extends Controller
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

    public function create($id)
    {

        $tasks = new Tasks;

        $list = Lists::findOne(['id' => $id, 'user_id' => App::$app->user->id]);

        $alert = '';

        if($list){

            if ($this->request->post()) {
    
                $tasks->data($this->request->body());
    
                $tasks->list_id = $list->id;
    
                if ($tasks->validate() && $tasks->save()) $this->response->setStatusCode(201);
            }

        } else {

            $tasks->addError('Błąd autoryzacji');

        }

        return $this->json([
            'error' => $tasks->getFirstError(),
            'alert' => $alert,
            'task' => $tasks
        ]);
    }

    public function tasks($id)
    {

        $error = false;

        $list = Lists::findOne(['id' => $id, 'user_id' => App::$app->user->id]);

        $tasks = [];

        if ($list) {

            $tasks = Tasks::findAll(['list_id' => $list->id]);

        } else {
            
            $error = 'Błąd autoryzacji';

        }

        return $this->json([
            'error' => $error,
            'tasks' => $tasks
        ]);


    }
}
