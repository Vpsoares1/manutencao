<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="sidebar.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Roboto+Slab:wght@100..900&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
</head>

<body>
    <nav class="menu-lateral">
        <img class="logo-sidebar" src="lb.png" alt="Logo">
        <ul>
            <li class="item-menu ativo">
                <a href="#">
                    <span class="icon"><i class="bi bi-speedometer2"></i></span>
                    <span class="txt-link">Dashboard</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="/solicitacao">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span class="txt-link">Criar solicitação</span>
                </a>

            </li>
        </ul>
        
    </nav>
    <h1  class="istok-web-bold"style="margin-left: 450px; margin-top: 50px; color: #12044e; font-size: 45px;">Solicitações de Manutenção</h1>
    <h1  class="istok-web-bold" style="margin-left: 450px; margin-top: 10px; color: #12044e; font-size: 20px;">Acompanhe e gerencie todas as
        solicitações de manutenção do sistema SESI</h1>
    <div class="row justify-content-center d-flex" style="margin-left: 230px;">
        <div class="col-8 rounded-3 shadow-lg p-3 mb-5 mt-2 bg-body-tertiary">
            <div class="row justify-content-left d-flex" style="margin-left: 0px;">
                <div class="form-field col-lg-3 col-md-2 col-sm-12 mt-3">
                    <label for="fieldSelect" class="form-label">Pesquisar solicitação</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Digite o nome do usuário"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                </div>
                <div class="form-field col-lg-3 col-md-2 col-sm-12 mt-3">
                    <label for="fieldSelect" class="form-label">Blocos</label>
                    <select class="form-select form-select-md" id="fieldSelect">
                        <option selected></option>
                        <option value="1">Bloco 1</option>
                        <option value="2">Bloco 2</option>
                        <option value="3">Bloco 3</option>
                        <option value="4">Bloco 4</option>
                    </select>
                </div>
                <div class="form-field col-lg-3 col-md-2 col-sm-12 mt-3">
                    <label for="fieldSelect" class="form-label">Status</label>
                    <select class="form-select form-select-md" id="fieldSelect">
                        <option selected></option>
                        <option value="1">Pendente</option>
                        <option value="2">Em andamento</option>
                        <option value="3">Concluído</option>
                    </select>
                </div>
                <div class="form-field col-lg-2 col-md-2 col-sm-12 mt-5">
                    <button type="button" class="btn btn-primary"> Filtrar </button>
                </div>
            </div>
        </div>
    </div>


    <div class="conteudo-principal">
        <div class="table-responsive">
            <table class="table mt-3">
                <table class="table table-striped col-lg-4 col-md-4 col-sm-12 mt-3" style="margin-left: 280px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Bloco</th>
                            <th scope="col">Sala</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Vinicius</td>
                            <td>Bloco 2</td>
                            <td>Sala DS</td>
                            <td>Problema com a lâmpada</td>
                            <td>2023-10-01</td>
                            <td>Pendente</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Daniel</td>
                            <td>Bloco 2</td>
                            <td>Sala DS</td>
                            <td>Problema com o computador</td>
                            <td>2023-10-02</td>
                            <td>Em andamento</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Sheila</td>
                            <td>Bloco 1</td>
                            <td>Sala 4</td>
                            <td>Problema com o projetor</td>
                            <td>2023-10-03</td>
                            <td>Concluído</td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                </table>
            </table>
        </div>
    </div>
    <script src="sidebar.js"></script>

</body>

</html>
