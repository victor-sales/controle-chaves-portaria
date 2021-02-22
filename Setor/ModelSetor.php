<?php

require_once 'C:\xampp\htdocs\controle-chaves-portaria\conn.php';

class ModelSetor {
    
    public function procurar() {
        
        try {
            $sql = "SELECT * FROM setor";

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
    
}
