<?php
include_once 'conexao.php';

class ExameDado {

    /// Variáveis da Classe
    private $nome;
    private $dado;
    private $dadoTipo;
    private $lowerRange;
    private $higherRange;

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

    public function getDado() {
        return $this->dado;
    }

    public function setDado($dado) {
        $this->dado = $dado;
    }

    public function getDadoTipo() {
        return $this->dadoTipo;
    }

    public function setDadoTipo($dadoTipo) {
        $this->dadoTipo = $dadoTipo;
    }

    public function getLowerRange() {
        return $this->lowerRange;
    }

    public function setLowerRange($lowerRange) {
        $this->lowerRange = $lowerRange;
    }

    public function getHigherRange() {
        return $this->higherRange;
    }

    public function setHigherRange($higherRange) {
        $this->higherRange = $higherRange;
    }

    
    /// Salvar
    public function save() {
        $pdo = conexao();

        try {
           
            $stmt = $pdo->prepare('INSERT INTO exame_dado (nome, dado, dado_tipo, lower_range, higher_range) VALUES(:nome, :dado, :dadoTipo, :lowerRange, :higherRange)');
            $stmt->execute([':nome' => $this->nome, ':dado' => $this->dado, ':dadoTipo' => $this->dadoTipo, ':lowerRange' => $this->lowerRange, ':higherRange' => $this->higherRange]);

        } catch(Exception $e) {
            //Log
            return $e;
        }
    }


    /// Deletar
    public static function delete ($id) {  
        $pdo = conexao();

        try{

            $stmt = $pdo->prepare('DELETE FROM exame_dado WHERE id_examedado = :id');
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
            foreach($pdo->query('SELECT * FROM exame_dado') as $lista ){

                $examedado = new ExameDado();
                
                $examedado->setNome($row['nome']);
                $examedado->setDado($row['dado']);
                $examedado->setDadoTipo($row['dado_tipo']);
                $examedado->setLowerRange($row['lower_range']);
                $examedado->setHigherRange($row['higher_range']);

                $lista[] = $examedado;
    
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
            foreach($pdo->query('SELECT * FROM exame_dado WHERE id = ' . $this.id)){

                $examedado = new ExameDaddo();

                $examedado->setNome($row['nome']);
                $examedado->setDado($row['dado']);
                $examedado->setDadoTipo($row['dado_tipo']);
                $examedado->setLowerRange($row['lower_range']);
                $examedado->setHigherRange($row['higher_range']);
    
            }
        } catch(Exception e) {
            //Log
            return $e;
        }   

        return $examedado;

    }
    

    /// Load
    public  function load($id){
        $pdo = conexao();

        try{        
            foreach($pdo->query('SELECT * FROM exame_dado WHERE id = ' . $this->id)){
                $this->setNome($row['nome']);
                $this->setDado($row['dado']);
                $this->setDadoTipo($row['dado_tipo']);
                $this->setLowerRange($row['lower_range']);
                $this->setHigherRange($row['higher_range']);
          
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