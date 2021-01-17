<?php

use app\system\App;

class m0003_lists
{
    public function up()
    {
        $db = App::$app->db;
        $query = "CREATE TABLE lists (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT(11) NOT NULL,
            title VARCHAR(255) NOT NULL,
            background VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $db->pdo->exec($query);

        $query2 = "ALTER TABLE `lists`ADD KEY `user_id` (`user_id`)";
        $db->pdo->exec($query2);

        $query3 = "ALTER TABLE `lists` ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE; COMMIT;";
        $db->pdo->exec($query3);

    }

    public function down()
    {
        $db = App::$app->db;
        $sql = "DROP TABLE lists";
        $db->pdo->exec($sql);
    }
}
