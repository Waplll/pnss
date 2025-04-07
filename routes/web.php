<?php
use Src\Route;
use App\Controller;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'], '/makeStudent', [Controller\Authorised::class, 'makeStudent'])->middleware('auth');
Route::add(['GET', 'POST'], '/makeGroup', [Controller\Authorised::class, 'makeGroup'])->middleware('auth');
Route::add(['GET', 'POST'], '/makeDiscipline', [Controller\Authorised::class, 'makeDiscipline'])->middleware('auth');
Route::add(['GET', 'POST'], '/showStudentGrades', [Controller\Authorised::class, 'showStudentGrades'])->middleware('auth');
Route::add(['GET', 'POST'], '/showGroupGrades', [Controller\Authorised::class, 'showGroupGrades'])->middleware('auth');
Route::add(['GET', 'POST'], '/showGroupDisciplines', [Controller\Authorised::class, 'showGroupDisciplines'])->middleware('auth');
Route::add(['GET', 'POST'], '/register', [Controller\Authorised::class, 'register'])->middleware('auth');