<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mostrarHome (Request $request)
    {
        $usuario = $request->usuario;
        return view('home')->with('usuario', $usuario);
    
    }

    public function mostrarFuncionario (Request $request)
    {
        $funcionario = $request->funcionario;
        return view('tela_funcionario')->with('funcionario', $funcionario);
    
    }

}
