<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => App\Model\User::class,
    //Классы для middleware
    'routeMiddleware' => [
        'auth' => App\Middlewares\AuthMiddleware::class,
        'auth:admin' => App\Middlewares\RoleMiddleware::class,
        'auth:employee' => App\Middlewares\RoleMiddleware::class,
    ],
];