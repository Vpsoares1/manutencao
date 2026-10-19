<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloco;

class BlocoController extends Controller
{
    public function salvar_bloco(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            
        ]);

        try {

            $bloco = new Bloco;
            $bloco->nome = $request->nome;
            $bloco->save();

            return response()->json(['message' => 'Bloco cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar bloco: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function alterar_bloco(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:bloco,id',
            'nome' => 'required|string|max:255',
            
        ]);

        try {

            $bloco = Bloco::find($request->id);

            if($bloco->nome !== $request->nome) {
                $bloco_nome_igual = Bloco::where('nome', $request->nome)->first();
                if ($bloco_nome_igual) {
                    return response()->json(['message' => 'Nome já cadastrado', 'erro' => 's'], 200);
                }
            }

            $bloco->nome = $request->nome;
            $bloco->save();

            return response()->json(['message' => 'Bloco alterado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao alterar bloco: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function deletar_bloco(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:bloco,id',
        ]);

        try {
            $bloco = Bloco::find($request->id);
            $bloco->delete();

            return response()->json(['message' => 'Bloco deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar bloco: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }

    public function listar_bloco(Request $request)
    {
        $blocos = Bloco::all();

        return response()->json(['blocos' => $blocos], 200);
    }
}
