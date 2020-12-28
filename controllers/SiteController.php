<?php

namespace app\controllers;

use app\system\Controller;
use app\system\Request;

class SiteController extends Controller
{

    public function home()
    {

        return $this->render('home');
        
    }

    public function contact()
    {

        $data['name'] = 'test contact';

        return $this->render('contact', $data);
        
    }

    public function handleContact(Request $request)
    {
        debug($request->body());
        // debug($_POST);
    }

}