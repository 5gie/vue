<?php
session_start();

require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\SiteController;
use app\controllers\AuthController;
use app\system\App;

$app = new App(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);


$app->run();


function debug($var)
{
    echo "<pre style='padding:10px;font-size:12px;background:#2D2D2D;color:#d0d0d0'>";
    echo '<h4 style="color:#FF5A5A">DEBUG MODE:</h4>';
    if (empty($var)) {
        echo 'TABLICA / ZMIENNA PUSTA!';
    } else {
        print_r($var);
    }
    echo "</pre>";
}
