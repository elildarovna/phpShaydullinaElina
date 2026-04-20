<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Controllers\HomeController;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

try {
    $controller = new HomeController();
    $controller->index();

} catch (\Throwable $e) {

    file_put_contents(
        "../error.log",
        date("Y-m-d H:i:s") . " " . $e->getMessage() . PHP_EOL,
        FILE_APPEND
    );

    http_response_code(500);

    if ($_ENV['APP_DEBUG'] === 'true') {
        echo "Ошибка: " . $e->getMessage();
    } else {
        echo "Что-то пошло не так";
    }
}