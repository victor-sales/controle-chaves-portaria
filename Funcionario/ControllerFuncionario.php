<?php 

require_once("Funcionario\ModelFuncionario.php");

class ControlFuncionario extends ModelFuncionario {

    private $nome_funcionario;
    private $setor_funcionario;

    public function __construct($nome_funcionario = "", $setor_funcionario = "") {

        $this->setNomeFuncionario($nome_funcionario);
        $this->setSetorFuncionario($setor_funcionario);
    }

    public function cadastrarFuncionario() {
        
        $nome_funcionario = $this->getNomeFuncionario();
        $id_setor =  $this->getSetorFuncionario();
        
        $cadastrar = parent::inserir($nome_funcionario, $id_setor);

        if ($cadastrar) {
            return true;
        } else {
            return false;
        }

    }

    public function listarFuncionario() {

        $listar_funcionario = parent::procurarTodos();
        
        if (count($listar_funcionario) != 0) {
            return $listar_funcionario;
        } else {
            return false;
        }
    }

    private function getNomeFuncionario(){
        return $this->nome_funcionario;
    }
    private function setNomeFuncionario($nome_funcionario){
        $this->nome_funcionario = $nome_funcionario;
    }
    private function getSetorFuncionario(){
        return $this->setor_funcionario;
    }
    private function setSetorFuncionario($setor_funcionario){
        $this->setor_funcionario = $setor_funcionario;
    }
}

?>