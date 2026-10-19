<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funcionario;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    public function cadastro_html (Request $request)
    {
        return view('tela_funcionario');
    }

    public function salvar_funcionario(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionario,email',
            'senha' => 'required|string|',
        ]);

        try {

            $funcionario = new Funcionario;
            $funcionario->cpf = $request->cpf;
            $funcionario->email = $request->email;
            $funcionario->senha = Hash::make($request->senha);
            $funcionario->save();

            return response()->json(['message' => 'Funcionário cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar funcionário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function alterar_funcionario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:funcionario,id',
            'cpf' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'senha' => 'required|string|',
        ]);

        try {

            $funcionario = Funcionario::find($request->id);

            if($funcionario->email !== $request->email) {
                $funcionario_email_igual = Funcionario::where('email', $request->email)->first();
                if ($funcionario_email_igual) {
                    return response()->json(['message' => 'Email já cadastrado', 'erro' => 's'], 200);
                }
            }

            $funcionario->cpf = $request->cpf;
            $funcionario->email = $request->email;
            $funcionario->senha = Hash::make($request->senha);
            $funcionario->save();

            return response()->json(['message' => 'Funcionário cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar funcionário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

     public function deletar_funcionario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:funcionario,id',
        ]);

        try {
            $funcionario = Funcionario::find($request->id);
            $funcionario->delete();

            return response()->json(['message' => 'Funcionário deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar funcionário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }

    public function listar_funcionario(Request $request)
    {
        $funcionarios = Funcionario::all();

        return response()->json(['funcionarios' => $funcionarios], 200);
    }



}
