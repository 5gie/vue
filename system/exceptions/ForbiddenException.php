<?php

namespace app\system\exceptions;

class ForbiddenException extends \Exception
{
    public function __construct()
    {
        header('HTTP/1.0 403 Forbidden');
    }
    
    protected $message = 'Yout dont have permission to access this page';
    protected $code = 403;
}