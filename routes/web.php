<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FuncionarioController;



Route::get('/cadastro', [UsuarioController::class, 'cadastro_html'])->name('cadastro');
Route::get('/solicitacao', [SolicitacaoController::class, 'cadastro_html'])->name('solicitacao');
Route::get('/manutencao', [ManutencaoController::class, 'cadastro_html'])->name('manutencao');
Route::get('/login', [LoginController::class, 'cadastro_html'])->name('login');
Route::get('/tela_funcionario', [FuncionarioController::class, 'cadastro_html'])->name('tela_funcionario');