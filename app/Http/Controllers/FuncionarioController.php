<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funcionario;

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
            'email' => 'required|email|unique:usuario,email',
            'senha' => 'required|string|',
        ]);

        try {

            $funcionario = new Usuario;
            $funcionario->cpf = $request->cpf;
            $funcionario->email = $request->email;
            $funcionario->senha = Hash::make($request->senha);
            $funcionario->save();

            return response()->json(['message' => 'Funcionário cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar funcionário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function alterar_usuario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:usuario,id',
            'cpf' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'senha' => 'required|string|',
        ]);

        try {

            $usuario = Usuario::find($request->id);

            if($usuario->email !== $request->email) {
                $usuario_email_igual = Usuario::where('email', $request->email)->first();
                if ($usuario_email_igual) {
                    return response()->json(['message' => 'Email já cadastrado', 'erro' => 's'], 200);
                }
            }

            $usuario->cpf = $request->cpf;
            $usuario->email = $request->email;
            $usuario->senha = Hash::make($request->senha);
            $usuario->save();

            return response()->json(['message' => 'Usuário cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar usuário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

     public function deletar_usuario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:usuario,id',
        ]);

        try {
            $usuario = Usuario::find($request->id);
            $usuario->delete();

            return response()->json(['message' => 'Usuário deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar usuário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }

    public function listar_usuarios(Request $request)
    {
        $usuarios = Usuario::all();

        return response()->json(['usuarios' => $usuarios], 200);
    }



}
