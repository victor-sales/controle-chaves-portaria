<?php

require_once 'C:\xampp\htdocs\controle-chaves-portaria\conn.php';

class ModelFuncionario {
    
    public function procurarTodos() {

        try {
            
            $sql = "SELECT * FROM funcionario";

            $conexao = new Conexao();
            $conn = $conexao->conn();

            $stmt = $conn->prepare($sql);
            if ($stmt->execute()) {
                
                $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
            
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    public function inserir($nome_funcionario, $id_setor) {

        try {
            
            $sql = "INSERT INTO funcionario values(null, :nome_funcionario, :id_setor_funcionario)";
            $conexao = new Conexao();

            $conn = $conexao->conn();
            $stmt = $conn->prepare($sql);
            
            $stmt->bindParam(":nome_funcionario", $nome_funcionario);
            $stmt->bindParam(":id_setor_funcionario", $id_setor);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        
    }
}