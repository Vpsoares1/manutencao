<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class AdminController extends Controller
{
    public function salvar_admin(Request $request)
    {
        $request->validate([
            'cargo' => 'required|string|max:255',
            
        ]);

        try {

            $admin = new admin;
            $admin->cargo = $request->cargo;
            $admin->save();

            return response()->json(['message' => 'Admin cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar admin: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function alterar_admin(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:admin,id',
            'cargo' => 'required|string|max:255',
            
        ]);

        try {

            $admin = admin::find($request->id);

            $admin->cargo = $request->cargo;
            $admin->save();

            return response()->json(['message' => 'Admin alterado com sucesso!', 'erro' => 'n'], 200);

        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao alterar admin: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }

    }

    public function deletar_admin(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:admin,id',
        ]);

        try {
            $admin = admin::find($request->id);
            $admin->delete();

            return response()->json(['message' => 'Admin deletado com sucesso!', 'erro' => 'n'], 200);
        } catch (\throwable $th) {
            return response()->json(['message' => 'Erro ao deletar admin: ', 'erro' => 's', 'msg_erro' => $th->getMessage(), 'erro' => 's'], 200);
        }
    }

    public function listar_admin(Request $request)
    {
        $admins = admin::all();

        return response()->json(['admins' => $admins], 200);
    }
}
