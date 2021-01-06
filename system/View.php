<?php 

namespace app\system;

abstract class View
{

    public function render()
    {

        include_once App::$ROOT_DIR . "/views/index.html";

    }
    // public string $title = '';
    // public string $layout = 'main';

    // public function renderView($view, $params = [])
    // {
    //     include_once App::$ROOT_DIR . "/views/$view.html";
    // }

    // public function setLayout($layout)
    // {

    //     $this->layout = $layout;
    // }

    // protected function layoutContent()
    // {

    //     ob_start();
    //     include_once App::$ROOT_DIR . "/views/layouts/$this->layout.php";
    //     return ob_get_clean();
    // }

    // protected function renderOnlyView($view, $params)
    // {

    //     foreach($params as $key => $value) $$key = $value;

    //     ob_start();
    //     include_once App::$ROOT_DIR . "/views/$view.php";
    //     return ob_get_clean();
    // }

}