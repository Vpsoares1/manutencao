<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UsuarioToken;

class UsuarioController extends Controller
{
    public function cadastro_html(Request $request)
    {
        return view('cadastro_usuario');
    }

    public function salvar_usuario(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|max:255',
            'email' => 'required|email|unique:usuario,email',
            'senha' => 'required|string|',
        ]);

        try {

            $usuario = new Usuario;
            $usuario->cpf = $request->cpf;
            $usuario->email = $request->email;
            $usuario->senha = Hash::make($request->senha);
            $usuario->save();

            return response()->json(['message' => 'Usuário cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar usuário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function alterar_usuario(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer|exists:usuario,id',
            'cpf' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'senha' => 'required|string|',
        ]);

        try {

            $usuario = Usuario::find($request->usuario_id);

            if ($usuario->email !== $request->email) {
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

    public function login(Request $request)
    {
        $request->validate([

            'senha' => 'required',
        ]);

         if($request->has('email')){
             $usuario = Usuario::where('email', $request->email)->first();
        }else if($request->has('cpf')){
             $usuario = Usuario::where('cpf', $request->cpf)->first();
        }else{
            return response()->json(['message' => 'Email ou CPF não informado', 'erro' => 's'], 200);
        }

        $usuario = Usuario::where('email', $request->email)->first();
        if ($usuario) {
            if (Hash::check($request->senha, $usuario->senha)) {
                $usuario_token = new UsuarioToken;
                $usuario_token->usuario_id = $usuario->id;
                $usuario_token->token = Hash::make($usuario->id . $usuario->email . now());
                $usuario_token->valido_ate = now()->addDays(7);
                $usuario_token->save();
                return response()->json(['message' => 'Login realizado com sucesso', 'erro' => 'n', 'token' => $usuario_token->token], 200);
            } else {
                return response()->json(['message' => 'Senha incorreta', 'erro' => 's'], 200);
            }

        } else {
            return response()->json(['message' => 'Usuário não encontrado', 'erro' => 's'], 200);
        }

    }

     public function logout_usuario(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|integer|exists:usuario,id',
        ]);

        try {
            $usuario = Usuario::where('id', $request->usuario_id)->first();
            $usuario->delete();

            return response()->json(['message' => 'Usuário deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar usuário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }
}
