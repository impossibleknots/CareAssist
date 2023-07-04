<?php


public function conexao(){
    try {
    
        // Adicionar Servidor
        // $pdo = new PDO('mysql:host=localhost;dbname=[SET]', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    }catch(PDOException $e){
            echo 'Erro de conexão: ' . $e->getMessage();
        }
    }
    
?>