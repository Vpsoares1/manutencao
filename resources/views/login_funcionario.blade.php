@extends('layout.principal')

@section('title', 'Cadastro de Usuário')

@section('content')

    <div class="row justify-content-center d-flex ">
        <div class="col-8 rounded-5 shadow-lg p-3 mb-5 mt-5 bg-body-tertiary">
            <img src="l.png" alt="Bootstrap" width="240" height="110" class="d-block mx-auto mb-4 mt-3">
            <h2 class="text-center mt-4 text-primary fonte"><b>MANUTENÇÃO SESI</b></h2>
            <div class="row justify-content-left d-flex" style="margin-left: 30px;">
                <div class="col-lg-8 col-md-8 col-sm-12 mt-3" style="margin-left: 120px;">
                    <label for="cpfemail2" class="form-label">CPF ou Email</label>
                    <input type="text" class="form-control form-control-sm" id="cpfemail2" name="cpfemail2"
                        placeholder="Digite seu CPF ou Email">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 mt-3" style="margin-left: 120px;">
                    <label for="senha3" class="form-label">Senha</label>
                    <input type="password" class="form-control form-control-sm" id="senha3" name="senha3"
                        placeholder="Digite sua senha">
                </div>
                <br>
                <div class="col-11 d-flex justify-content-center gap-3 mt-5 mb-3">
                    <button type="button" class="btn btn-outline-primary"> Esqueci a senha </button>
                    <button type="button" class="btn btn-primary" id="btnEntrar"> Entrar </button>
                </div>
            </div>
        </div>
    </div>
@endsection