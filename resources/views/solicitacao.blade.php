<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</head>

<body
    style="background-image: url('f.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <nav class="navbar bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#" style="height: 50px;">
            </a>
        </div>
    </nav>
    <div class="row justify-content-center d-flex ">
        <div class="col-8 rounded-5 shadow-lg p-3 mb-5 mt-5 bg-body-tertiary">
            <img src="l.png" alt="Bootstrap" width="240" height="110" class="d-block mx-auto mb-4 mt-3">
            <h2 class="text-center mt-4 text-primary fonte"><b>MANUTENÇÃO SESI</b></h2>
            <div class="row justify-content-left d-flex" style="margin-left: 30px;">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <label for="cpf" class="form-label">Solicitante</label>
                    <input type="text" class="form-control form-control-sm" id="cpf" name="cpf"
                        placeholder="Digite seu nome">
                </div>
                <div class="form-field col-lg-6 col-md-6 col-sm-12 mt-3">
                    <label for="fieldSelect" class="form-label">Bloco</label>
                    <select class="form-select form-select-sm" id="fieldSelect">
                        <option selected></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="exampleFormControlTextarea2" class="form-label">Descrição</label>
                    <textarea class="form-control" id="exampleFormControlTextarea2" rows="4"></textarea>
                </div>
                <br>
                <div class="col-11 d-flex justify-content-center gap-3 mt-5 mb-3">
                    <button type="button" class="btn btn-outline-primary"> Esqueci a senha </button>
                    <button type="button" class="btn btn-primary"> Entrar </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
