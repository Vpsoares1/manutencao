<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\BlocoController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\AdminController;


//Usuarios//

Route::post('/cadastro_usuario', [UsuarioController::class, 'salvar_usuario']);
Route::put('/alterar_usuario', [UsuarioController::class, 'alterar_usuario']);
Route::delete('/deletar_usuario', [UsuarioController::class, 'deletar_usuario']);
Route::get('/listar_usuarios', [UsuarioController::class, 'listar_usuarios']);

//Funcionarios//

Route::post('/cadastro_funcionario', [FuncionarioController::class, 'salvar_funcionario']);
Route::put('/alterar_funcionario', [FuncionarioController::class, 'alterar_funcionario']);
Route::delete('/deletar_funcionario', [FuncionarioController::class, 'deletar_funcionario']);
Route::get('/listar_funcionario', [FuncionarioController::class, 'listar_funcionario']);

//Blocos//

Route::post('/cadastro_bloco', [BlocoController::class, 'salvar_bloco']);
Route::put('/alterar_bloco', [BlocoController::class, 'alterar_bloco']);
Route::delete('/deletar_bloco', [BlocoController::class, 'deletar_bloco']);
Route::get('/listar_bloco', [BlocoController::class, 'listar_bloco']);

//Salas//

Route::post('/cadastro_sala', [SalasController::class, 'salvar_sala']);
Route::put('/alterar_sala', [SalasController::class, 'alterar_sala']);
Route::delete('/deletar_sala', [SalasController::class, 'deletar_sala']);
Route::get('/listar_sala', [SalasController::class, 'listar_sala']);

//Status_Solicitação//

Route::post('/cadastro_status', [SolicitacaoController::class, 'salvar_status']);
Route::put('/alterar_status', [SolicitacaoController::class, 'alterar_status']);
Route::delete('/deletar_status', [SolicitacaoController::class, 'deletar_status']);
Route::get('/listar_status', [SolicitacaoController::class, 'listar_status']);

//Solicitação//

Route::post('/cadastro_solicitacao', [SolicitacaoController::class, 'salvar_solicitacao']);
Route::put('/alterar_solicitacao', [SolicitacaoController::class, 'alterar_solicitacao']);
Route::delete('/deletar_solicitacao', [SolicitacaoController::class, 'deletar_solicitacao']);
Route::get('/listar_solicitacao', [SolicitacaoController::class, 'listar_solicitacao']);

//Admin//

Route::post('/cadastro_admin', [AdminController::class, 'salvar_admin']);
Route::put('/alterar_admin', [AdminController::class, 'alterar_admin']);
Route::delete('/deletar_admin', [AdminController::class, 'deletar_admin']);
Route::get('/listar_admin', [AdminController::class, 'listar_admin']);