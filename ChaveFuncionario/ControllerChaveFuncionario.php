<?php

require_once("ChaveFuncionario\ModelChaveFuncionario.php");

class ControlChaveFuncionario extends ModelChaveFuncionario {

    private $numero_chave;
    private $id_funcionario;

    public function __construct($numero_chave = "", $id_funcionario = ""){
        $this->setNumeroChave($numero_chave);
        $this->setIdFuncionario($id_funcionario);
    }

    public function emprestarChave() {

        $chave = $this->getNumeroChave();
        $funcionario = $this->getIdFuncionario();
    
        $alterar = parent::inserir($funcionario, $chave);

        return $alterar;
    }

    public function procurarChavesEmprestadas() {
        
        $chaves_funcionario = parent::procurar();
        if (count($chaves_funcionario) > 0) {
            return $chaves_funcionario;
        } else {
            return false;
        }
    }

    private function getNumeroChave(){
        return $this->numero_chave;
    }

    private function setNumeroChave($numero_chave){
        $this->numero_chave = $numero_chave;    
    }

    private function getIdFuncionario(){
        return $this->id_funcionario;
    }

    private function setIdFuncionario($id_funcionario){
        $this->id_funcionario = $id_funcionario;
    }
}
?>