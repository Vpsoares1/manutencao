<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solicitacao_manutencao;
use App\Models\status_manutencao;



class SolicitacaoController extends Controller
{
    public function cadastro_html (Request $request)
    {
        return view('solicitacao');
    }

    public function salvar_status(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
        ]);

        try {

            $status = new status_manutencao;
            $status->descricao = $request->descricao;
            $status->save();

            return response()->json(['message' => 'Status cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar status: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function alterar_status(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:status_manutencao,id',
            'descricao' => 'required|string|max:255',
            
        ]);

        try {

            $status = status_manutencao::find($request->id);

            if($status->descricao !== $request->descricao) {
                $status_descricao_igual = status_manutencao::where('descricao', $request->descricao)->first();
                if ($status_descricao_igual) {
                    return response()->json(['message' => 'Descrição já cadastrada', 'erro' => 's'], 200);
                }
            }

            $status->descricao = $request->descricao;
            $status->save();

            return response()->json(['message' => 'Status alterado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao alterar status: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function deletar_status(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:status_manutencao,id',
        ]);

        try {
            $status = status_manutencao::find($request->id);
            $status->delete();

            return response()->json(['message' => 'Status deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar status: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }

    public function listar_status(Request $request)
    {
        $status = status_manutencao::all();

        return response()->json(['status' => $status], 200);
    }

    public function salvar_solicitacao(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string',
            'status_manutencao_id' => 'required|exists:status_manutencao,id',
            'usuario_id' => 'nullable|integer|exists:usuario,id',
            'funcionario_id' => 'nullable|integer|exists:funcionario,id',
            'sala_id' => 'required|integer|exists:salas,id',
            'bloco_id' => 'required|integer|exists:bloco,id',
        ]);

        try {

            $soli = new solicitacao_manutencao;
            $soli->descricao = $request->descricao;
            $soli->status_manutencao_id = $request->status_manutencao_id;
            $soli->usuario_id = $request->usuario_id;
            $soli->funcionario_id = $request->funcionario_id;
            $soli->sala_id = $request->sala_id;
            $soli->bloco_id = $request->bloco_id;
            $soli->save();

            return response()->json(['message' => 'Solicitação cadastrada com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar solicitação: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function alterar_solicitacao(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:funcionario,id',
            'descricao' => 'required|string',
            'status_manutencao_id' => 'required|exists:status_manutencao,id',
            'usuario_id' => 'nullable|integer|exists:usuario,id',
            'funcionario_id' => 'nullable|integer|exists:funcionario,id',
            'sala_id' => 'required|integer|exists:salas,id',
            'bloco_id' => 'required|integer|exists:bloco,id',
        ]);

        try {

            $solicitacao = solicitacao_manutencao::find($request->id);


            $solicitacao->descricao = $request->descricao;
            $solicitacao->status_manutencao_id = $request->status_manutencao_id;
            $solicitacao->usuario_id = $request->usuario_id;
            $solicitacao->funcionario_id = $request->funcionario_id;
            $solicitacao->sala_id = $request->sala_id;
            $solicitacao->bloco_id = $request->bloco_id;
            $solicitacao->save();

            return response()->json(['message' => 'Solicitação alterada com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao alterar solicitação: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function deletar_solicitacao(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:solicitacao_manutencao,id',
        ]);

        try {
            $solicitacao = solicitacao_manutencao::find($request->id);
            $solicitacao->delete();

            return response()->json(['message' => 'Solicitação deletada com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar solicitação: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }

     public function listar_solicitacao(Request $request)
    {
        $solicitacoes = solicitacao_manutencao::all();

        return response()->json(['solicitacoes' => $solicitacoes], 200);
    }


     
}
