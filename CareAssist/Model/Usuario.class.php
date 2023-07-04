<?php
include_once 'conexao.php';

class Usuario {

    /// Variáveis da Classe
    private $nome;
    private $senha;
    private $email;
    
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
    
    public function getSenha() {
        return $this->senha;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    /// Salvar
    public function save(){
        $pdo = conexao();

        try{
        
            $stmt = $pdo->prepare('INSERT INTO usuario (nome, senha, email) VALUES(:nome, :senha, :email)');
            $stmt->execute([':nome' => $this->nome], [':senha' => $this->senha], [':email' => $this->email]);

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
            $stmt = $pdo->prepare('DELETE FROM usuario WHERE id_usuario = :id')
            $stmt->execute([':id => $id']);

        } catch(Exception $e) {
            //Log
            return $e;
    }

    }


    /// Atualizar
    // TO-DO: Criar Update para Senha
    public function update ($id) {

        $pdo = conexao();
        
        try{

            $stmt = $pdo->prepare('UPDATE Usuario SET email = :email WHERE id_usuario = :id')
            $stmt->execute([':email' => $this->email, ':id' => $this->id]);

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
            foreach($pdo->query('SELECT * FROM Usuario') as $lista ){

                $usuario = new Usuario();
                
                $usuario->setNome($lista['nome']);
                $usuario->setSenha($lista['senha']);
                $usuario->setEmail($lista['email']);

                $lista[] = $usuario;
    
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
            foreach($pdo->query('SELECT * FROM Usuario WHERE id = ' . $this.id)){

                $usuario = new Usuario();

                $usuario->setNome($lista['nome']);
                $usuario->setSenha($lista['senha']);
                $usuario->setEmail($lista['email']);
    
            }
        } catch(Exception e) {
            //Log
            return $e;
        }   

        return $usuario;

    }
    

    /// Load
    public  function load($id){
        $pdo = conexao();

        try{        
            foreach($pdo->query('SELECT * FROM Usuario WHERE id = ' . $this->id)){
                $this->setNome($lista['nome']);
                $this->setSenha($lista['senha']);
                $this->setEmail($lista['email']);
          
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