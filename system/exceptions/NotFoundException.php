<?php

namespace app\system\exceptions;

class NotFoundException extends \Exception
{

    public function __construct()
    {
        header('HTTP/1.0 404 Not Found');
    }

    protected $message = 'Page not found';
    protected $code = 404;
}
