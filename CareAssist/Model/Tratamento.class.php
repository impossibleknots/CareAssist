<?php
include_once 'conexao.php';

class Tratamento {

    /// Variáveis da Classe
    private $nome;
    
    private $id;

    /// Getters e Setters
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
    
    /// Salvar
    public function save(){
        $pdo = conexao();

        try{
        
            $stmt = $pdo->prepare('INSERT INTO Tratamento (nome) VALUES(:nome)');
            $stmt->execute([':nome' => $this->nome]);

        } catch(Exception $e) {
            //Log
            return $e;
        }
    }


    /// Deletar
    public static function delete ($id) {  
        $pdo = conexao();

        try{

            /// TO-DO Adicionar DELETE do Tratamento, medicamentos exames etc ao deletar user...
            $stmt = $pdo->prepare('DELETE FROM Tratamento WHERE id_tratamento = :id')
            $stmt->execute([':id => $id']);

        } catch(Exception $e) {
            //Log
            return $e;
    }

    }

    /// getAll
    public static function getAll() {
        $pdo = conexao();
        
        try{
            $lista = [];
            foreach($pdo->query('SELECT * FROM Tratamento') as $lista){

                $tratamento = new Tratamento();
                
                $tratamento->setNome($lista['nome']);

                $lista[] = $tratamento;
    
            }
        } catch(Exception e) {
            //Log
            return $e;
        }   

        return $lista;

    }
    

    /// getOne
    public static function getOne($id) {
        $pdo = conexao();
        
        try{
            foreach($pdo->query('SELECT * FROM Tratamento WHERE id = ' . $this.id)){

                $tratamento = new Tratamento();

                $tratamento->setNome($lista['nome']);
    
            }
        } catch(Exception e) {
            //Log
            return $e;
        }   

        return $tratamento;

    }
    

    /// Load
    public  function load($id){
        $pdo = conexao();

        try{        
            foreach($pdo->query('SELECT * FROM Tratamento WHERE id = ' . $this->id)){
                $this->setNome($lista['nome']);
          
            }

        } catch (Exception $e) {
            //Log
            return $e;
        }

        return $this;
    }

    ///Fim

}

>