<?php

namespace App\Controller;


use App\Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;



class Site
{

    public function index(Request $request): string
    {

        //    $departments = Department::where('id', $request->id)->get(); Не работает!!!
        $departments = Department::all();
        return (new View())->render('site.department', ['departments' => $departments]);
    }
    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/hello');
        }
        return new View('site.signup');
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }


    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }


    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
}