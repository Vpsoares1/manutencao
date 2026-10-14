<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FuncionarioController;



Route::post('/cadastro_usuario', [UsuarioController::class, 'salvar_usuario']);
Route::put('/alterar_usuario', [UsuarioController::class, 'alterar_usuario']);
Route::delete('/deletar_usuario', [UsuarioController::class, 'deletar_usuario']);
Route::get('/listar_usuarios', [UsuarioController::class, 'listar_usuarios']);

//Funcionarios//

Route::post('/cadastro_funcionario', [FuncionarioController::class, 'salvar_funcionario']);
Route::put('/alterar_funcionario', [FuncionarioController::class, 'alterar_funcionario']);
Route::delete('/deletar_funcionario', [FuncionarioController::class, 'deletar_funcionario']);
Route::get('/listar_funcionario', [FuncionarioController::class, 'listar_funcionarios']);

  