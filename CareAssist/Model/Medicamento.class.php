<?php
include_once 'conexao.php';

class Medicamento {

    /// Variáveis da Classe
    private $nome;
    private $dose;
    private $doseTipo;
    private $frequencia;
    private $metodoIngestao;
    private $funcao;
    private $tempoTomar;

    private $id;

    // Getters and Setters
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

    public function getDose() {
        return $this->dose;
    }

    public function setDose($dose) {
        $this->dose = $dose;
    }

    public function getDoseTipo() {
        return $this->doseTipo;
    }

    public function setDoseTipo($doseTipo) {
        $this->doseTipo = $doseTipo;
    }

    public function getFrequencia() {
        return $this->frequencia;
    }

    public function setFrequencia($frequencia) {
        $this->frequencia = $frequencia;
    }

    public function getMetodoIngestao() {
        return $this->metodoIngestao;
    }

    public function setMetodoIngestao($metodoIngestao) {
        $this->metodoIngestao = $metodoIngestao;
    }

    public function getFuncao() {
        return $this->funcao;
    }

    public function setFuncao($funcao) {
        $this->funcao = $funcao;
    }

    public function getTempoTomar() {
        return $this->tempoTomar;
    }

    public function setTempoTomar($tempoTomar) {
        $this->tempoTomar = $tempoTomar;
    }

    // Save
    public function save() {
        $pdo = conexao();

        try {
           
            $stmt = $pdo->prepare('INSERT INTO medicamento (nome, dose, dose_tipo, frequencia, metodo_ingestao, funcao, tempo_tomar) VALUES(:nome, :dose, :doseTipo, :frequencia, :metodoIngestao, :funcao, :tempoTomar)');
            $stmt->execute([':nome' => $this->nome, ':dose' => $this->dose, ':doseTipo' => $this->doseTipo, ':frequencia' => $this->frequencia, ':metodoIngestao' => $this->metodoIngestao, ':funcao' => $this->funcao, ':tempoTomar' => $this->tempoTomar]);
        
        } catch (Exception $e) {
            // Log
            return $e;
        }
    }

    // Delete
    public static function delete($id) {
        $pdo = conexao();

        try {

            $stmt = $pdo->prepare('DELETE FROM medicamento WHERE id_medicamento = :id');
            $stmt->execute([':id' => $id]);

        } catch (Exception $e) {
            // Log
            return $e;
        }
    }

    // Update
    public function update($id, $nose, $dose, $doseTipo, $frequencia, $metodoIngestao, $tempoTomar) {
        $pdo = conexao();

        try {

            $stmt = $pdo->prepare('UPDATE medicamento SET dose = :dose, frequencia = :frequencia, tempo_tomar = :tempoTomar WHERE id_medicamento = :id');
            $stmt->execute([':nome' => $this->nome, ':dose' => $this->dose, ':doseTipo' => $this->doseTipo, ':frequencia' => $this->frequencia, ':metodoIngestao' => $this->metodoIngestao,':funcao' => $this->funcao, ':tempoTomar' => $this->tempoTomar, ':id' => $id]);
        
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
            foreach($pdo->query('SELECT * FROM Medicamento') as $lista ){               
               
                $medicamento = new Medicamento();
               
                $medicamento->setNome($lista['nome']);
                $medicamento->setDose($lista['dose']);
                $medicamento->setDoseTipo($lista['dose_tipo']);
                $medicamento->setFrequencia($lista['frequencia']);
                $medicamento->setMetodoIngestao($lista['metodo_ingestao']);
                $medicamento->setFuncao($lista['funcao']);
                $medicamento->setTempoTomar($lista['tempo_tomar']);

                $lista[] = $medicamento;
            
            }
        } catch (Exception $e) {
            // Log
            return $e;
        }

        return $lista;
    }

    ///Pegar os Medicamentos de um Usuário
    public static function getMedicamentoAll($id) {
        $pdo = conexao();

        try {
            $lista = [];
            foreach($pdo->query('SELECT * FROM Medicamentos INNER JOIN Tratamento_Medicamentos ON Medicamentos.id = Tratamento_Medicamentos.id_medicamento INNER JOIN Tratamento ON Tratamento_Medicamentos.id_tratamento = Tratamento.id_tratamento WHERE Tratamento.id = ' . $this.id) as $lista){               

                $medicamento = new Medicamento();
               
                $medicamento->setNome($lista['nome']);
                $medicamento->setDose($lista['dose']);
                $medicamento->setDoseTipo($lista['dose_tipo']);
                $medicamento->setFrequencia($lista['frequencia']);
                $medicamento->setMetodoIngestao($lista['metodo_ingestao']);
                $medicamento->setFuncao($lista['funcao']);
                $medicamento->setTempoTomar($lista['tempo_tomar']);

                $lista[] = $medicamento;
            
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
            foreach($pdo->query('SELECT * FROM Medicamento WHERE id = ' . $this.id)){

            $medicamento = new Medicamento();
           
            $medicamento->setNome($lista['nome']);
            $medicamento->setDose($lista['dose']);
            $medicamento->setDoseTipo($lista['dose_tipo']);
            $medicamento->setFrequencia($lista['frequencia']);
            $medicamento->setMetodoIngestao($lista['metodo_ingestao']);
            $medicamento->setFuncao($lista['funcao']);
            $medicamento->setTempoTomar($lista['tempo_tomar']);

        } catch (Exception $e) {
            // Log
            return $e;
        }

        return $medicamento;
    }

    // Load
    public function load($id) {
        $pdo = conexao();

        try {
            foreach($pdo->query('SELECT * FROM Medicamento WHERE id = ' . $this->id)){
                $this->setNome($lista['nome']);
                $this->setDose($lista['dose']);
                $this->setDoseTipo($lista['dose_tipo']);
                $this->setFrequencia($lista['frequencia']);
                $this->setMetodoIngestao($lista['metodo_ingestao']);
                $this->setFuncao($lista['funcao']);
                $this->setTempoTomar($lista['tempo_tomar']);
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

