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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Olá, seja bem vindo!</p>
    <a href="logoff.php">Sair</button>
</body>
</html>

