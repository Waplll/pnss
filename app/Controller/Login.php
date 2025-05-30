<?php

namespace App\Controller;

use Src\Auth\Auth;
use Src\Request;
use Src\View;


class Login
{

    public function login(Request $request)
    {
        if ($request->method === 'POST') {

            if (Auth::attempt($request->all())) {
                $token = app()->auth::generateToken();
                Auth::user()->update([
                    'token' => $token
                ]);
                $users = app()->auth::user()->toArray();
                (new View())->toJSON((array)($users['token']));
                app()->route->redirect('/hello');
            } else {
                (new View())->toJSON((array)'Login failed');
            }
        }
    }

}