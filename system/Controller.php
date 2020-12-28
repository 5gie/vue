<?php 

namespace app\system;

class Controller
{
 
    public string $layout = 'main';

    public function setLayout($layout)
    {

        $this->layout = $layout;

    }

    public function render($view, $params = []){

        $template = new Template;

        return $template->renderView($view, $params);

    }

}