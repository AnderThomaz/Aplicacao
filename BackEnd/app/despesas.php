<?php 

require_once 'conexao.php'; // Conexao com bano de dados

session_start();

// Verificaçao se foi efeito login antes de entrar na deshbord ou app
if (isset($_SESSION['emailUser'])) {
    $emailUser = $_SESSION['emailUser'];
    
} else {
    header('Location: ../../');
    exit();
}

$date = $_POST['data'];

// Normalizar Data para o bando de dados receber
$date = date("Y-m-d", strtotime(str_replace('/', '-', $date)));
//receber o valor do enviado
$valor =  $_POST['valor'];


// Normalizar o valor - sem ponto e virugulas somente .00
function Normalizar_valor($valor) {
        // Remover todas as pontuações
        $valor = preg_replace('/[^0-9]/', '', $valor);

        // Adicionar um ponto antes dos dois últimos dígitos decimais
        $tamanho = strlen($valor);
        $valor = substr_replace($valor, '.', $tamanho - 2, 0);

    return $valor;
}

$valorParaBanco = Normalizar_valor($valor);

//Receber Descrição
$descricao = $_POST['Desc'];


//Receber os o id do email logado 
$idUser = $_SESSION['idUser'];


$tipoTransi = 1;

echo $valor;
echo $descricao;
echo $date;

// No banco dados foi criado um regra que todas as transiçoes do tipo despesas signifaca o numero 1 e 0 para recebimento

// 0 = Recebimento
// 1 = Despesas

$cadDespesas = $conn->prepare("INSERT INTO `transacoes` (`user_id`, `valor`, `data_pagamento`, `Descricao`, `tipo_de_transi`) VALUES (?,?,?,?,?)");

$cadDespesas->bind_param("sssss",$idUser,$valorParaBanco,$date,$descricao,$tipoTransi);

if ($cadDespesas->execute()) {
    header("location: ../../app/despesas?return=cad-despesa");
    exit();
    

}else {
    echo 'Error';
}

$cadDespesas->close();
$conn->close();
?>