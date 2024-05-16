<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura o valor enviado pelo formulário
    $id_transacao = htmlspecialchars($_POST['id_transacao']);

    $_SESSION['id_transacao'] = $id_transacao;

    exit();

    // Processa os dados conforme necessário
    // Aqui você pode salvar os dados em um banco de dados, buscar informações, etc.

    // Exemplo de resposta
} else {

    $id_transacao = $_SESSION['id_transacao'];
    require_once 'conexao.php';

}

$idUser = $_SESSION['idUser'];


$Detalhes = $conn->prepare($sql = "SELECT * FROM `transacoes` WHERE `id_transacao` = ? AND `user_id` = ?");

$Detalhes->bind_param("ss", $id_transacao, $idUser);

$Detalhes->execute();
$resulDetalhes = $Detalhes->get_result();


if($resulDetalhes->num_rows > 0) {
    while ($valores = $resulDetalhes->fetch_assoc()) {
        $tipoDesp = $valores['Descricao'];
        $valor = $valores['valor'];
        $dataInclusao = date("d/m/Y", strtotime ( $valores['dataInclusao']));
        $dataPagamento = date("d/m/Y", strtotime($valores['data_pagamento']));
        
    }
}

?>


<link rel="stylesheet" href="../../estilo/StyleApp/style.css">
<link rel="stylesheet" href="../../estilo/StyleApp/Detalhes.css">





<div id="detalhes">
    <h1>#<?php echo $id_transacao?></h1>


    <div id="tipoDesp" class="informacoes"><p class="titulo">Tipo Despesas</p><p><?php echo $tipoDesp?></p></div>
    
    <div id="valorDespesa" class="informacoes"><p class="titulo">Valor</p><p>R$ <?php echo $valor = number_format($valor, 2, ',', '.')?></p></div>
    
    <div id="dataInclusao" class="informacoes"><p class="titulo">Data de inclusão</p><p><?php echo $dataInclusao?></p></div>

    <div id="dataPagamento" class="informacoes"><p class="titulo">Data de pagamento</p><p><?php echo $dataPagamento?></p></div>
    
    <div id="buttom">
        <button value="Excluir">Excluir</button>
        <button value="Atualizar">Atualizar</button>
    </div>


</div>

