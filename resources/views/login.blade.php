@extends('layout.principal')

@section('title', 'Cadastro de Usuário')

@section('content')

    <div class="row justify-content-center d-flex ">
        <div class="col-8 rounded-5 shadow-lg p-3 mb-5 mt-5 bg-body-tertiary">
            <img src="l.png" alt="Bootstrap" width="240" height="110" class="d-block mx-auto mb-4 mt-3">
            <h2 class="text-center mt-4 text-primary fonte"><b>MANUTENÇÃO SESI</b></h2>
            <div class="row justify-content-left d-flex" style="margin-left: 30px;">
                <div class="form-field col-lg-6 col-md-6 col-sm-12 mt-3">
                    <label for="fieldSelect" class="form-label">Usúario</label>
                    <select class="form-select form-select-sm" id="fieldSelect">
                        <option selected></option>
                        <option value="1">Manutenção</option>
                        <option value="2">Funcionario</option>
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control form-control-sm" id="cpf" name="cpf"
                        placeholder="Digite seu CPF">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                        placeholder="Digite seu email">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control form-control-sm" id="senha" name="senha"
                        placeholder="Digite sua senha">
                </div>
                <br>
                <div class="col-11 d-flex justify-content-center gap-3 mt-5 mb-3">
                    <button type="button" class="btn btn-outline-primary"> Esqueci a senha </button>
                    <button type="button" class="btn btn-primary"> Entrar </button>
                </div>
            </div>
        </div>
    </div>
@endsection
