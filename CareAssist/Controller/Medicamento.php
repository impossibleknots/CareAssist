<?php
$acao = $_GET['acao'];
    
include_once '../Model/Medicamento.class.php';

// Cadastrar no banco
if($acao='cadastrar'){
    $medicamento=new Medicamento();
    
    $medicamento->setNome($_POST['nome']);
    $medicamento->setDose($_POST['dose']);
    $medicamento->setDoseTipo($_POST['dosetipo']);
    $medicamento->setFrequencia($_POST['frequencia']);
    $medicamento->setMetodoIngestao($_POST['metodoingestao']);
    $medicamento->setFuncao($_POST['funcao']);
    $medicamento->setTempoTomar($_POST['tempotomar']);

    $medicamento->save();

    
}else if($acao='deletar'){

    $medicamento=new Medicamento();

    $medicamento->setId($_REQUEST['id']);

    $medicamento->deletar();

}else if($acao='update'){

    $medicamento = new Medicamento();

    $medicamento->setId($_REQUEST['id']);

    $medicamento->setNome($_POST['nome']);
    $medicamento->setDose($_POST['dose']);
    $medicamento->setFrequencia($_POST['frequencia']);
    $medicamento->setTempoTomar($_POST['tempotomar']);

    $medicamento->update();

}

//Pegar Medicamento de um tratamento
//}else if($acao='MedicamentosDoTratamento'){

//    $medicamentos = [];
//    $medicamentos = Medicamento::getAll();

//}


?>