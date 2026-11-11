<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LogadoWebMiddleware;
use App\Http\Middleware\FuncionarioLoginMiddleware;



Route::get('/cadastro', [UsuarioController::class, 'cadastro_html'])->name('cadastro');
Route::get('/solicitacao', [SolicitacaoController::class, 'cadastro_html'])->name('solicitacao');
Route::get('/manutencao', [ManutencaoController::class, 'cadastro_html'])->name('manutencao')->middleware(FuncionarioLoginMiddleware::class);
Route::get('/login', [LoginController::class, 'cadastro_html'])->name('login');
Route::get('/tela_funcionario', [FuncionarioController::class, 'cadastro_html'])->name('tela_funcionario')->middleware(LogadoWebMiddleware::class);
Route::get('/login_teste', [LoginController::class, 'login_teste'])->name('login_teste');
Route::get('/home', [HomeController::class, 'mostrarHome'])->name('home');
Route::get('/login_funcionario', [LoginController::class, 'login_funcionario'])->name('login_funcionario');