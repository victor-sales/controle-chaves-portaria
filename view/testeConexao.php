<?php

require_once("../model/conn.php");

try {
    // Instanciando a classe
    $conexao = new Conexao();

    $sql = "SELECT * from usuario";

    // //criando um objeto
    $conn = $conexao->conn();

    $stmt = $conn->prepare($sql);
    
    if($stmt->execute()){
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($array);
    }

} catch (PDOException $e) {
    print_r($e->getMessage());
}

