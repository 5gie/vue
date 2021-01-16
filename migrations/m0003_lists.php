<?php

use app\system\App;

class m0003_lists
{
    public function up()
    {
        $db = App::$app->db;
        $query = "CREATE TABLE lists (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            background VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $db->pdo->exec($query);

    }

    public function down()
    {
        $db = App::$app->db;
        $sql = "DROP TABLE lists";
        $db->pdo->exec($sql);
    }
}
