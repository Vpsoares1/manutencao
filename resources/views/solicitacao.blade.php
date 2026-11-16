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
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"
            integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @vite(['resources/js/cadastro_solicitacao.js'])
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
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                    <label for="solicitante" class="form-label">Solicitante</label>
                    <input type="text" class="form-control form-control-sm" id="solicitante" name="solicitante"
                        placeholder="Digite seu nome">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                    <label for="statusSelect" class="form-label">Status</label>
                    <select class="form-select form-select-sm" id="statusSelect">
                        @foreach ($status as $st)
                            <option value="{{ $st['id'] }}">{{ $st['descricao'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                    <label for="salaSelect" class="form-label">Sala</label>
                    <select class="form-select form-select-sm" id="salaSelect">
                        @foreach ($salas as $s)
                            <option value="{{ $s['id'] }}">{{ $s['nome'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 mt-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="4"></textarea>
                </div>
                <div class="col-12 d-flex justify-content-center gap-3 mt-5 mb-3">
                    <button type="button" class="btn btn-outline-primary"> Esqueci a senha </button>
                    <button type="button" class="btn btn-primary"> Entrar </button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
