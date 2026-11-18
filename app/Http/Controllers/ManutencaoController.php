<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Salas;
use App\Models\solicitacao_manutencao;
use App\Models\status_manutencao;
use App\Models\Funcionario;
use App\Models\Bloco;

use Illuminate\Http\Request;

class ManutencaoController extends Controller
{
    public function cadastro_html (Request $request)
    {
        $dados = Usuario::select('usuario.email', 'bloco.nome as bloco_nome', 'salas.nome as sala_nome', 'status_manutencao.descricao as status_descricao', 'solicitacao_manutencao.descricao as solicitacao_descricao')
        ->join('solicitacao_manutencao', 'usuario.id', '=', 'solicitacao_manutencao.usuario_id')
            ->join('salas', 'salas.id', '=', 'solicitacao_manutencao.sala_id')
            ->join('bloco', 'bloco.id', '=', 'salas.bloco_id')
            ->join('status_manutencao', 'status_manutencao.id', '=', 'solicitacao_manutencao.status_manutencao_id')
            ->get();
        return view('manutencao')->with('dados', $dados);
        
    }

    
}
