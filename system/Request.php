<?php

namespace app\system;

class Request
{

    public function getPath()
    {

        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');

        if($position === false) return $path;

        return substr($path, 0, $position);

    }

    public function method()
    {

        return strtolower($_SERVER['REQUEST_METHOD']);

    }

    public function get()
    {

        return $this->method() == 'get';

    }

    public function post()
    {

        return $this->method() == 'post';

    }

    public function body()
    {

        $body = [];

        if($this->get()){

            foreach ($_GET as $key => $get) $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);

        }

        if($this->post()){

            $json = json_decode(file_get_contents('php://input'), true);

            if($json && is_array($json)) foreach ($json as $i => $j) $body[$i] = filter_var($j, FILTER_SANITIZE_SPECIAL_CHARS);

        }

        return $body;

    }

}