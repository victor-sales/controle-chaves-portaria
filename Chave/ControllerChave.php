<?php 

require_once("Chave\ModelChave.php");

class ControlChave extends ModelChave {
    
    private $numero_sala;
    private $nome_sala;
    private $status_chave;

    public function __construct($numero_sala = "", $nome_sala = "", $status_chave = 0) {

        $this->setNumeroSala($numero_sala);
        $this->setNomeSala($nome_sala);
        $this->setStatusChave($status_chave);
    }

    public function listarChave() {
        $resultado = parent::procurarTodos();

        if (count($resultado) != 0) {
            return $resultado;
        } else {
            return false;
        }
    }   

    public function inserirChave() {

        $numero_sala = $this->getNumeroSala();
        $nome_sala = $this->getNomeSala();
        $status_chave = $this->getStatusChave();

        $procurar = parent::procurarUm($numero_sala);
        
        if (count($procurar) != 0) {
            $retorno = "Chave já existente no sistema";
            return $retorno;
        
        } else {

            $resultado = parent::inserir($numero_sala, $nome_sala, $status_chave);
            
            if($resultado) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function verificarStatus() {

        $numero_sala = $this->getNumeroSala();
        $procurar = parent::procurarUm($numero_sala);
        return $procurar;
    }

    public function atualizarStatus() {

        $numero_sala = $this->getNumeroSala();
        $status_chave = $this->getStatusChave();

        $atualizarStatus = parent::atualizar($numero_sala, $status_chave);

        if ($atualizarStatus) {
            return true;
        } else {
            return false;
        }
    }

    public function getNumeroSala(){
        return $this->numero_sala;
    }
    public function setNumeroSala($numero_sala){
        $this->numero_sala = $numero_sala;
    }
    public function getNomeSala(){
        return $this->nome_sala;
    }
    public function setNomeSala($nome_sala){
        $this->nome_sala = $nome_sala;
    }
    public function getStatusChave(){
        return $this->status_chave;
    }
    public function setStatusChave($status_chave){
        $this->status_chave = $status_chave;
    }
}

?>