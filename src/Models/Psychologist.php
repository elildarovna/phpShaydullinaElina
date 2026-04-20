<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Psychologist
{
    public static function all()
    {
        try {
            $db = Database::getInstance();

            $sql = "CREATE TABLE IF NOT EXISTS psychologists (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT,
                specialty TEXT
            )";
            $db->exec($sql);

            $check = $db->query("SELECT COUNT(*) FROM psychologists")->fetchColumn();

            if ($check == 0) {
                $db->exec("
                    INSERT INTO psychologists (name, specialty) VALUES
                    ('Анна', 'Тревожность'),
                    ('Мария', 'Стресс'),
                    ('Ирина', 'Депрессия')
                ");
            }

            $stmt = $db->query("SELECT * FROM psychologists");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Throwable $e) {

            file_put_contents(
                "error.log",
                date("Y-m-d H:i:s") . " " . $e->getMessage() . PHP_EOL,
                FILE_APPEND
            );

            if ($_ENV['APP_DEBUG'] === 'true') {
                echo "Ошибка: " . $e->getMessage();
            }

            return [];
        }
    }
}