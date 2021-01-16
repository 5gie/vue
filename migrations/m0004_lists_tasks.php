<?php

use app\system\App;

class m0004_lists_tasks
{
    public function up()
    {
        $db = App::$app->db;
        $query = "CREATE TABLE `tasks` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `user_id` int(11) NOT NULL,
            `title` varchar(250) NOT NULL,
            `status` tinyint NOT NULL,
            `created_at` datetime NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $db->pdo->exec($query);

        $query2 = "ALTER TABLE `tasks`ADD KEY `user_id` (`user_id`)";
        $db->pdo->exec($query2);

        $query3 = "ALTER TABLE `tasks` ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE; COMMIT;";
        $db->pdo->exec($query3);

    }

    public function down()
    {
        $db = App::$app->db;
        $sql = "DROP TABLE tasks";
        $db->pdo->exec($sql);
    }
}
