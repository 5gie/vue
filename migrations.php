<?php

use app\system\App;
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ],
    'SECRET_KEY' => $_ENV['SECRET_KEY']
];

$app = new App(__DIR__, $config, false);

$app->db->applyMigrations();