<?php

require_once 'C:\xampp\htdocs\controle-chaves-portaria\conn.php';

class ModelUsuario {

    public function procurar () {

        try {
            // Instanciando a classe
            $conexao = new Conexao();
        
            $sql = "SELECT * from usuario";
        
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

    public function inserir ($nome_usuario, $senha_usuario) {

        try {
            // Instanciando a classe
            $conexao = new Conexao();
        
            $sql = "INSERT INTO usuario VALUES(NULL, :nome_usuario, :senha_usuario)";
        
            // //criando um objeto
            $conn = $conexao->conn();
        
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":nome_usuario", $nome_usuario);
            $stmt->bindParam(":senha_usuario", $senha_usuario);
            
            if($stmt->execute()){
                $array = $stmt->fetch(PDO::FETCH_ASSOC);
                return $array;
            }
        
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        
    }

    public function atualizarSenha ($nova_senha) {

        try {
            // Instanciando a classe
            $conexao = new Conexao();
        
            $sql = "UPDATE usuario SET senha_usuario = :nova_senha";
        
            // //criando um objeto
            $conn = $conexao->conn();
        
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":nova_senha", $nova_senha);
            
            if($stmt->execute()){
                $array = $stmt->fetch(PDO::FETCH_ASSOC);
                return $array;
            }
        
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        
    }
}