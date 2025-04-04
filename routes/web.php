<?php
use Src\Route;
use App\Controller;
Route::add('GET', '/', [Controller\Site::class, 'index']);
Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/makeStudent', [Controller\Authorised::class, 'makeStudent'])->middleware('auth');