<?php

namespace app\system\middlewares;

use app\system\App;
use app\system\exceptions\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{
    public function execute()
    {
        if(App::isGuest()) throw new ForbiddenException();
    }
}
