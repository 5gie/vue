<?php

namespace app\controllers;

use app\models\ContactForm;
use app\system\Controller;
use app\system\Request;
use app\system\Response;

class SiteController extends Controller
{

    public function home()
    {

        // return $this->render('index');
        
    }

    public function test()
    {

        return $this->json(['test' => 'test123']);

    }

    public function contact(Request $request)
    {

        $contact = new ContactForm;
        if($request->post()){
            $contact->data($request->body());
            if($contact->validate() && $contact->send()){
                $this->flash = ['alert' => 'Thanks for contacting us.'];
            } else {
                $this->flash = ['error' => 'Something goes wrong'];
            }
        }

        return $this->json('contact', [
            'model' => $contact,
            'flash' => $this->flash
        ]);
        
    }

    public function handleContact(Request $request)
    {
        debug($request->body());
        // debug($_POST);
    }

}