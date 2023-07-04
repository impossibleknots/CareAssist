<?php
include_once 'conexao.php';
    
class Exame {
    
    // Variáveis da classe
    private $nome;
    private $data;
    
    private $id;

    // Getters e Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function setData($data) {
        $this->data = $data;
    }
    
    // Salvar
    public function save() { 
        $pdo = conexao();
    
        try {

            $stmt = $pdo->prepare('INSERT INTO exame (nome, data) VALUES(:nome, :data)');
            $stmt->execute([':nome' => $this->nome, ':data' => $this->data]);
            
        } catch (Exception $e) {
                // Log
            return $e;
        }
    }
    
    // Delatar
    public static function delete ($id) {
        $pdo = conexao();
    
        try {

            $stmt = $pdo->prepare('DELETE FROM exame WHERE id_exame = :id');
            $stmt->execute([':id' => $id]);
            
        } catch (Exception $e) {
            // Log
            return $e;
        }
    }
    
    // getAll
    public static function getAll() {
        $pdo = conexao();
    
        try {
            $lista = [];
            foreach ($pdo->query('SELECT * FROM exame') as $lista) {
                    
                $exame = new Exame();
                    
                $exame->setNome($lista['nome']);
                $exame->setData($lista['data']);
                 
                $lista[] = $exame;
                
            }
        } catch (Exception $e) {
            // Log
            return $e;
        }
    
        return $lista;
    }
    
    // getOne
    public static function getOne($id) {
        $pdo = conexao();
    
        try {
            foreach($pdo->query('SELECT * FROM Exame WHERE id_exame = ' . $this->id)){

                $exame = new Exame();

                $exame->setNome($lista['nome']);
                $exame->setData($lista['data']);
                
            }
        } catch (Exception $e) {
            // Log
            return $e;
        }
    
        return $exame;
    
    }
    
    // Load
    public function load($id) {
        $pdo = conexao();
    
        try {
            foreach($pdo->query('SELECT * FROM Exame WHERE id = ' . $this->id)){
                $this->setNome($lista['nome']);
                $this->setData($lista['data']);
               
            }
        } catch (Exception $e) {
            // Log
            return $e;
        }
    
        return $this;
    }

    ///Fim

}

>

