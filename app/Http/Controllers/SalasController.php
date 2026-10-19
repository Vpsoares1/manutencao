<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;

class SalasController extends Controller
{
    public function salvar_sala(Request $request)
    {
        $request->validate([
            'bloco_id' => 'required|integer|exists:bloco,id',
            'nome' => 'required|string|max:255',
            
        ]);

        try {

            $sala = new Salas;
            $sala->bloco_id = $request->bloco_id;
            $sala->nome = $request->nome;
            $sala->save();

            return response()->json(['message' => 'Sala cadastrada com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar sala: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function alterar_sala(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:salas,id',
            'bloco_id' => 'required|integer|exists:bloco,id',
            'nome' => 'required|string|max:255',
            
        ]);

        try {

            $sala = Salas::find($request->id);

            if($sala->nome !== $request->nome) {
                $sala_nome_igual = Salas::where('nome', $request->nome)->first();
                if ($sala_nome_igual) {
                    return response()->json(['message' => 'Nome já cadastrado', 'erro' => 's'], 200);
                }
            }

            $sala->nome = $request->nome;
            $sala->save();

            return response()->json(['message' => 'Sala alterada com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao alterar sala: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function deletar_sala(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:salas,id',
        ]);

        try {
            $sala = Salas::find($request->id);
            $sala->delete();

            return response()->json(['message' => 'Sala deletada com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar sala: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }

    public function listar_sala(Request $request)
    {
        $salas = Salas::all();

        return response()->json(['salas' => $salas], 200);
    }

}
