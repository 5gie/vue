<?php 

namespace app\system;

class Template
{

    public function renderView($view, $params = [])
    {

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        include_once App::$ROOT_DIR . "/views/$view.php";
    }

    protected function layoutContent()
    {
        // $layout = App::$app->controller->layout;
        $layout = App::$app->controller->layout;
        ob_start();
        include_once App::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {

        foreach($params as $key => $value) $$key = $value;

        ob_start();
        include_once App::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

}