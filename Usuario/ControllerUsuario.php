<?php

require_once("ModelUsuario.php");

class ControlUsuario extends ModelUsuario {

    private $nome_usuario;
    private $senha_usuario;

    public function __construct($nome_usuario, $senha_usuario) {
        $this->setNomeUsuario($nome_usuario);
        $this->setSenhaUsuario($senha_usuario);
    }

    public function logar() {
        $resultado = parent::procurar();
        for ($i = 0; $i < sizeof($resultado); $i++){
            
            if ($resultado[$i]['nome_usuario'] != $this->getNomeUsuario() || $resultado[$i]['senha_usuario'] != $this->getSenhaUsuario()) {
                return false;
            } else {
                return true;
            }
        }
    }
    // public function alterarSenha();
    // public function cadastrarChave();
    // public function alterarChave();
    // public function alterarStatusChave();

    public function getNomeUsuario(){
        return $this->nome_usuario;
    }
    public function setNomeUsuario($nome_usuario){
        $this->nome_usuario = $nome_usuario;
    }
    public function getSenhaUsuario(){
        return $this->senha_usuario;
    }
    public function setSenhaUsuario($senha_usuario){
        $this->senha_usuario = $senha_usuario;
    }

    // public function getNivelUsuario(){
    //     return $this->nivel_usuario;
    // }
    // public function setNivelUsuario($nivel_usuario){
    //     $this->nivel_usuario = $nivel_usuario;
    // }
}