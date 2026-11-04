<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funcionario;
use App\Models\Usuario;
use App\Models\FuncionarioToken;
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

    public function login_funcionario(Request $request)
    {
        $request->validate([
            'senha' => 'required'
        ]);

        if($request->has('email')){
             $funcionario = Funcionario::where('email', $request->email)->first();
        }else if($request->has('cpf')){
                $funcionario = Funcionario::where('cpf', $request->cpf)->first();
        }else{
            return response()->json(['message' => 'Email ou CPF não informado', 'erro' => 's'], 200);
        }

        if ($funcionario) {
            if (Hash::check($request->senha, $funcionario->senha)) {
                $funcionario_token = new FuncionarioToken;
                $funcionario_token->funcionario_id = $funcionario->id;
                $funcionario_token->token = Hash::make($funcionario->id . $funcionario->email . now());
                $funcionario_token->valido_ate = now()->addDays(7);
                $funcionario_token->save();
                return response()->json(['message' => 'Login realizado com sucesso', 'erro' => 'n', 'token' => $funcionario_token->token], 200);
            } else {
                return response()->json(['message' => 'Senha incorreta', 'erro' => 's'], 200);
            }

        } else {
            return response()->json(['message' => 'Funcionário não encontrado', 'erro' => 's'], 200);
        }

    }

      public function logout_funcionario(Request $request)
    {
        $request->validate([
            'funcionario_id' => 'required|integer|exists:funcionario,id',
        ]);

        try {
            $funcionario = Funcionario::where('id', $request->funcionario_id)->first();
            $funcionario->delete();

            return response()->json(['message' => 'Funcionário deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar funcionário: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }


}
