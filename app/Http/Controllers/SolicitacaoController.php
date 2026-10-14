<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    public function cadastro_html (Request $request)
    {
        return view('solicitacao');
    }

     
}
