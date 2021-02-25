<?php

require_once 'C:\xampp\htdocs\controle-chaves-portaria\conn.php';

class ModelChaveFuncionario{

    public function inserir($funcionario, $chave) {

        try {
            $sql = "INSERT INTO funcionario_chave values(null, :id_funcionario, :id_chave)";

            $conexao = new Conexao();
            $conn = $conexao->conn();
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":id_funcionario", $funcionario);
            $stmt->bindParam(":id_chave", $chave);
    
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            print_r($e->getMessage());

        }
        
    }

    public function procurar() {
        try {

            $sql = "SELECT numero_chave, nome_funcionario, nome_setor from funcionario_chave 
            inner join chave on funcionario_chave.id_chave = chave.numero_chave
            inner join funcionario on funcionario_chave.id_funcionario = funcionario.id 
            inner join setor on id_setor_funcionario = setor.id";
            
            $conexao = new Conexao();
            $conn = $conexao->conn();
            $stmt = $conn->prepare($sql);
            
            if ($stmt->execute()) {

                $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            print_r($e->getMessage());

        }
    }

    public function remover($chave) {

        try {

            $sql = "DELETE FROM funcionario_chave where id_chave = :numero_chave";

            $conexao = new Conexao();
            $conn = $conexao->conn();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":numero_chave", $chave);

    
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


?>