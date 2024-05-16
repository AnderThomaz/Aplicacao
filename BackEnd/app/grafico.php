<?php 
    require_once 'conexao.php';
    

    $idUser = $_SESSION['idUser'];

    $mes = $_SESSION['mes'];
    
    $ano = date("Y"); // Correção para obter o ano completo

    $grafico = $conn->prepare($sql = "SELECT * FROM `transacoes` WHERE `user_id` = ? AND MONTH(data_pagamento) = ? AND YEAR(data_pagamento) = ? ORDER BY `transacoes`.`id_transacao` DESC");

    $grafico->bind_param("sss", $idUser, $mes, $ano);

    $grafico->execute();
    $resulGrafico = $grafico->get_result();

    if($resulGrafico->num_rows > 0) {

        echo '<ul class="lista-itens">';
            while ($valores = $resulGrafico->fetch_assoc()) {
            echo '<li class="item' . $valores["tipo_de_transi"] . ' detalhes_lancamentos" onclick="AbrirInformacao(this)">';

            echo '<span class="id_transacao">' . $valores["id_transacao"] . '</span>';
            echo '<span class="descricao">' . $valores["Descricao"] . '</span>';
            echo '<span class="data">' . date("d/m/Y", strtotime($valores["data_pagamento"])) . '</span>';
            echo '<span class="valor' . $valores["tipo_de_transi"] . ' valor" >R$ ' . ($valores["tipo_de_transi"] === 1 ? ' -' : '') . number_format($valores["valor"], 2, ',', '.') . '</span>';
        echo '</li>';
        }
        echo '</ul>';
    }else {
        echo '<h1>Sem Lançamentos</h1>';
        echo '<p>Registre seus recebimentos e despesas para que apareçam aqui..</p>';
    }

//<span class="valor' . $valores["tipo_de_transi"]; $tipoTrans = $valores["tipo_de_transi"]
?>

