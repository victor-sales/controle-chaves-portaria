<?php 

session_start();

if (!isset($_SESSION) || $_SESSION['logado'] != 1) {
    header('Location: http://localhost/controle-chaves-portaria/login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Document</title>
</head>
<body>

    <div class="container-fluid">
        <header id="cabecalho">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><i class="fas fa-key"></i></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Chave
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a id="btn-cadastrar-chave" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-cadastrar-chave">Cadastrar Chave</a></li>
                                        <li><a class="dropdown-item" href="#">Remover Chave</a></li>
                                        <li><a class="dropdown-item" href="#">Alterar chave</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                            <div class="dropdown">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Funcionário
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a id="btn-cadastrar-funcionario" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-cadastrar-funcionario">Adicionar Funcionário</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                            <div class="dropdown position-absolute end-0">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Usuario
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Alterar Senha</a></li>
                                        <li><a class="dropdown-item" href="logoff.php">Sair</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <section>
            
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h6 class="card-title">Emprestar Chave</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <select name="select-chave-emprestar" id="select-chave-emprestar" class="form-select">
                                    <option value="">Selecione...</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="select-funcionario-emprestar" id="select-funcionario-emprestar" class="form-select">
                                    <option value="">Selecione...</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <button id="btn-emprestar-chave" class="btn btn-primary">Emprestar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div id="confirmacao-emprestar-chave" class="col-12 alerta-cadastro">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body table-wrapper">
                        <table class="table table-hover table-responsive-sm custom-table">
                        <thead>
                            <tr>
                                <th scope="col">Chave</th>
                                <th scope="col">Funcionário</th>
                                <th scope="col">Setor do Funcionário</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody id="chaves-emprestadas">
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        </section>
        
        <footer id="rodape">
            <div class="row">
                <div class="col-4 justify-content-center">
                    <h3 class="titulo-rodape">Sobre</h3>
                    <p>Sistema criado para efetuar o controle de chaves da empresa pela portaria. O controle hoje é feito atraves de um caderno onde o guarda responsável no dia registra quem pegou a chave do setor.</p>
                </div>
                <div class="col-4 justify-content-center" style="border-right: 1px solid gray; border-left: 1px solid gray;">
                    <h3 class="titulo-rodape">Tecnologias Utilizadas</h3>
                    <div class="row">
                        <div class="col-6">
                            <ul class="tecnologias">
                                <li><i class="fab fa-html5"></i> HTML</li>
                                <li><i class="fab fa-css3"></i> CSS</li>
                                <li><i class="fab fa-bootstrap"></i> Bootstrap</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="tecnologias">
                                <li><i class="fab fa-js"></i> javascript</li>
                                <li><i class="fab fa-php"></i> PHP</li>
                                <li><i class="fas fa-database"></i> MySQL</li>
                            </ul>    
                        </div>
                    </div>
                </div>
                <div class="col-4 justify-content-center">
                    <h3 class="titulo-rodape">Redes</h3>
                    <ul id="redes-sociais">
                        <li><i class="fab fa-linkedin"></i> <a href="">LinkedIn</a></li>
                        <li><i class="fab fa-github"></i> <a href="">GitHub</a></li>
                    </ul>
                </div>
            </div>
        </footer>



        <!-- ------------- CHAVES ------------- -->
        <!-- ------------- MODAL CADASTRO ----- -->

        <div id="modal-cadastrar-chave" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="text-align: center;">
                        <h6>Cadastrar Chave</h6>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-4">
                                <input id="input-cadastrar-numero-sala" type="text" class="form-control" placeholder="Numero da sala">
                            </div>
                            <div class="col-8">
                                <input id="input-cadastrar-nome-sala" type="text" class="form-control" placeholder="Nome da sala">
                            </div>
                        </div>
                        <div class="row">
                            <div id="confirmacao-cadastrar-chave" class="col-12 alerta-cadastro">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button id="btn-confirmar-cadastrar-chave" type="button" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------- FUNCIONARIO ------------- -->
    <!-- ------------- MODAL CADASTRO ----- -->

    <div id="modal-cadastrar-funcionario" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="text-align: center;">
                        <h6>Cadastrar Funcionário</h6>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8">
                                <input id="input-cadastrar-nome-funcionario" type="text" class="form-control" placeholder="Nome do Funcionário">
                            </div>
                            <div class="col-4">
                                <select name="select-cadastrar-setor-funcionario" id="select-cadastrar-setor-funcionario" class="form-select">
                                    <option value="" disabled>Selecione...</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div id="confirmacao-cadastrar-funcionario" class="col-12 alerta-cadastro">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button id="btn-confirmar-cadastrar-funcionario" type="button" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/5583d7f484.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript" src="javascript/principal.js"></script>
</body>
</html>

