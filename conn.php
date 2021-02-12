<?php

class Conexao {

    protected $user = "root";
    protected $password = "";

    public function conn (){
        try {

            $conn = new PDO('mysql:host=localhost;dbname=controle_chaves_portaria', $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $e) {
            echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
        }
    }
}

?>

