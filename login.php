<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Login</title>
</head>
<body>

    <div class="container">

        <div id="card-login" class="card text-center" style="width: 30rem;">
            <div class="card-header">
                <p class="card-title">Login <i class="fas fa-sign-in-alt"></i></p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="index.php">
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="text" name="nome_usuario" id="nome_usuario">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="password" name="senha_usuario" id="senha_usuario">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary" id="botao-login" type="button">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <h6><?php echo date('Y')?> <i class="far fa-copyright"></i></h6>
            </div>
        </div>
    </div>
        
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
    


    <script type="text/javascript" src="javascript/login.js"></script>
    <script src="https://kit.fontawesome.com/5583d7f484.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>