<?php

require_once 'C:\xampp\htdocs\controle-chaves-portaria\conn.php';

class ModelChave {
    
    public function procurarTodos () {

        try {
            // Instanciando a classe
            $conexao = new Conexao();
        
            $sql = "SELECT * from chave where status <> 1";
        
            // //criando um objeto
            $conn = $conexao->conn();
        
            $stmt = $conn->prepare($sql);
            
            if($stmt->execute()){
                $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            }
        
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    public function procurarUm ($numero_sala) {
        try {
            $conexao = new Conexao();
            $sql = "SELECT * FROM chave WHERE numero_chave = :numero_chave";
            
            $conn = $conexao->conn();

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":numero_chave", $numero_sala);

            if($stmt->execute()){
                $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $array;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
            
    }

    public function inserir ($numero_sala, $nome_sala, $status_chave) {

        try {
            $conexao = new Conexao();
            // Instanciando a classe
            $sql = "INSERT INTO chave VALUES(NULL, :numero_chave, :nome_sala, :status)";
        
            // //criando um objeto
            $conn = $conexao->conn();
        
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":numero_chave", $numero_sala);
            $stmt->bindParam(":nome_sala", $nome_sala);
            $stmt->bindParam(":status", $status_chave);
            
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        
    }

    public function atualizar ($numero_chave, $status) {

        try {

            $sql = "UPDATE chave set status = :valor_status where numero_chave = :numero_chave";

            $conexao = new Conexao();

            $conn = $conexao->conn();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":valor_status", $status);
            $stmt->bindParam(":numero_chave", $numero_chave);

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