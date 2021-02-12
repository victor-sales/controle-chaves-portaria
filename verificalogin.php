<?php
session_start();
require_once("Usuario/ControllerUsuario.php");
header('Content-Type: application/json');

$dados = file_get_contents("php://input");

$dados = json_decode($dados, true);

$nome_usuario = $dados['nome_usuario'];
$senha_usuario = $dados['senha_usuario'];

$usuario = new ControlUsuario($nome_usuario, $senha_usuario);

$usuarios = $usuario->logar();

if($usuarios == true) {
    $_SESSION['logado'] = 1;
    $_SESSION['nome_usuario'] = $nome_usuario;
    echo "true";
} else {
    $_SESSION['logado'] = 0;
    echo "false";
}
?>