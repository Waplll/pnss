<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

// Путь до директории с конфигурационными файлами
const DIR_CONFIG = __DIR__ . '/../config';

// Функция для загрузки конфигураций
function getConfigs(string $path = DIR_CONFIG): array
{
    $settings = [];
    foreach (scandir($path) as $file) {
        if ($file === '.' || $file === '..') continue;
        $name = explode('.', $file)[0];
        if (!empty($name)) {
            $settings[$name] = include $path . '/' . $file;
        }
    }
    return $settings;
}

require __DIR__ . '/../vendor/autoload.php';

// 1. Сначала загружаем конфиги
$configs = getConfigs();

// 2. Создаем экземпляр приложения
$app = new Src\Application(new Src\Settings($configs));

// 3. Инициализируем маршрутизатор
$route = $app->route;

// 4. Только теперь подключаем маршруты
require_once __DIR__ . '/../routes/web.php';

function app() {
    global $app;
    return $app;
}

// Возвращаем приложение
return $app;