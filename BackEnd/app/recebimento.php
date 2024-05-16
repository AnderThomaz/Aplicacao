<?php 

require_once 'conexao.php';

session_start();



if (isset($_SESSION['emailUser'])) {
    $emailUser = $_SESSION['emailUser'];
    
} else {
    header('Location: ../../');
    exit();
}

$date = $_POST['data'];


// Normalizar Data para o bando de dados receber
$date = date("Y-m-d", strtotime(str_replace('/', '-', $date)));
$valor =  $_POST['valor'];
$descricao = $_POST['Desc'];
$idUser = $_SESSION['idUser'];



function Normalizar_valor($valor) {
    // Remover todas as pontuações
    $valor = preg_replace('/[^0-9]/', '', $valor);

    // Adicionar um ponto antes dos dois últimos dígitos decimais
    $tamanho = strlen($valor);
    $valor = substr_replace($valor, '.', $tamanho - 2, 0);

    return $valor;
}


$valorParaBanco = Normalizar_valor($valor);


$cadRecebimento = $conn->prepare("INSERT INTO `transacoes` ( `user_id`, `valor`, `data_pagamento`, `descricao`) VALUES (?,?,?,?)");

$cadRecebimento->bind_param("ssss",$idUser,$valorParaBanco,$date,$descricao);

if ($cadRecebimento->execute()) {
    header("location: ../../app/recebimento?return=cad-recebimento");
}else {
    echo 'Error';
}

$cadRecebimento->close();
$conn->close();

?>