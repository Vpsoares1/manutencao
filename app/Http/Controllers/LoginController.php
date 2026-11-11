<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function cadastro_html (Request $request)
    {
        return view('login');
    }

    public function login_teste (Request $request)
    {
        return view('login_teste');
    }

    public function login_funcionario (Request $request)
    {
        return view('login_funcionario');
    }
}
