<?php

require_once("Setor\ModelSetor.php");

class ControlSetor extends ModelSetor{
    
    public function listarSetores() {

        $array = parent::procurar();
        
        if (count($array) != 0) {
            return $array;
        } else {
            return false;
        }
    }
}
