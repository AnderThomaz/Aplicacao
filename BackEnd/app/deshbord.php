<?php

    date_default_timezone_set('America/Sao_Paulo'); // Substitua pelo fuso horário correto


use PhpMyAdmin\Plugins\Schema\Dia\Dia;

    require_once 'conexao.php';

    session_start();

    // Verificaçao se foi efeito login antes de entrar na deshbord

    if (isset($_SESSION['emailUser'])) {
        $emailUser = $_SESSION['emailUser'];
        
    } else {
        header('Location: ../../');
        exit();
    }

    if (isset($_SESSION['mesSelect'])) {
        $selectedOption = $_SESSION['mesSelect'];
        if (!empty($selectedOption)) {
            $mes = $selectedOption;
            
        }
    } else {
        // Caso $_SESSION['mesSelect'] não esteja definido, você pode definir um valor padrão para $mes
        $mes = date("n");
    }


    $_SESSION['mes'] = $mes;
    $ano = date('Y');

    // Assosiaçao com o emial cadastrado com a chave primaria no banco de dados 
    $stmt = $conn->prepare($sql = "SELECT *  FROM `login` WHERE `email` = ?  ORDER BY `id` ASC");

    $stmt->bind_param("s",$emailUser);

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        while($IdDoUser = $result->fetch_assoc()) {
            $idUser =  $IdDoUser['id'];
            // Enviado Associao de email com id para o backend Recebimento
            $_SESSION['idUser'] = $idUser;
        }
    }else {
        // Se nada de certo voltar para o login
        header('../../');
        exit();
    }

    /////////////////////////////////////////////
    // Checagem de Dias / Mes e Ano //

    if (isset($_SESSION['mesSelect'])) {
        $mes =  $_SESSION['mesSelect'];
        
    } else {
        $mes = date('n');
    }


        $ano = date('Y');
        $dia = date('d');
        $ultmoDia = date('t') + 1;

    $ultimoDiaMes = date('t', strtotime($ano . '-' . $mes . '-01')) - 1;


//    if ($MesA =date('n') < $mes){ // Se mes atual for menor que o mes de seleçao
//        $dia = 0;
//        $diaEntr = 1 ;
//
//    }elseif ($mes < $MesA =date('n')){ // Se o mes de seleçao for maior que mes atual
//        $ultmoDia = 0;
//        $dia = date($mes.'-t');
//        $ultimoDiaMes = $dia;
//        
//    }else{
//        $dia += 1;
//        $diaEntr = $dia + 1;
//        
//    }
//
//    if($mes >= $mesAtual = date('n')) {
//        $dia = date('n') ;
//
//    }



    /////////////////////////////////////////////


    if($mesAtual = date('n') > $mes) {
        $dia = 32;
    }
    elseif ($mesAtual = date('n') == $mes) {
        $dia  = date('d'); 

    }else {
        $dia = 0;
    }  
    


    $idEntradas = $conn->prepare($sql = "SELECT * FROM `transacoes` WHERE `user_id` = ? AND DAY(data_pagamento) BETWEEN 1 AND ? AND MONTH(data_pagamento) = ? AND YEAR(data_pagamento) = ? AND `tipo_de_transi` = 0");

    $idEntradas->bind_param("ssss",$idUser, $dia,$mes,$ano);

    $idEntradas->execute();
    $result2 = $idEntradas->get_result();

    if ($result2->num_rows > 0) {
        $soma_total = 0;
    
        while ($somas = $result2->fetch_assoc()) {
            $soma_total += $somas['valor'];

        }

        // Aqui chamamos a função fora do loop
    } else {
        $soma_total = 0;
    }


    /////////////////////////////////////////////

    if($mes == $mesAtual = date('n')) {
        $diaEntr = $dia + 1;
        
    }
    elseif($mes > $mesAtual = date('n'))
    { 
        $diaEntr = 0;
    } else {
        $diaEntr = 32;
    }

    

    // Futuras Entradas


    $EntradasFuturas = $conn->prepare($sql = "SELECT * FROM `transacoes` WHERE `user_id` = ? AND DAY(data_pagamento) BETWEEN ? AND ? AND MONTH(data_pagamento) = ? AND YEAR(data_pagamento) = ? AND `tipo_de_transi` = 0");

    $EntradasFuturas->bind_param("sssss",$idUser, $diaEntr,$ultmoDia,$mes,$ano);

    $EntradasFuturas->execute();
    $result3 = $EntradasFuturas->get_result();

    if ($result3->num_rows > 0) {
        $FuturasEntra = 0;
    
        while ($somas = $result3->fetch_assoc()) {
            $FuturasEntra += $somas['valor'];

        
    }

    // Aqui chamamos a função fora do loop
    } else {
    $FuturasEntra = 0;
    }
    
        // Somatoria das saidas

    if($mes > $mesAtual = date('n')) {
        $ultmoDia = 0;

    } elseif ($mes == $mesAtual = date('n')) 
    {
        $ultmoDia = date('d');
    
    }else {
        $ultmoDia = 32;

    }


    $Saidas = $conn->prepare($sql = "SELECT *  FROM `transacoes` WHERE `user_id` = ? AND DAY(data_pagamento) BETWEEN 0 AND ? AND MONTH(data_pagamento) = ? AND YEAR(data_pagamento) = ? AND `tipo_de_transi` = 1 ");

    $Saidas->bind_param("ssss",$idUser,$ultmoDia,$mes,$ano);

    $Saidas->execute();
    $result4 = $Saidas->get_result();

    if($result4->num_rows > 0) {

        $soma_total_saida = 0 ;

        while($somaSaida = $result4->fetch_assoc()){
        $soma_total_saida += $somaSaida['valor'];

        // Aqui esta uma formatação meia boca rs para colocar o valore em reai


       }
    }else{
        $soma_total_saida = 0;
    }

    //////////////////////////////////////

    if($mes > $mesAtual = date('n')) {
        $dia  = 1;

    } elseif ($mes == $mesAtual = date('n')) 
    {
        $dia = date('d') + 1;

    
    }else {
        $ultmoDia = 32;

    }

    $ultimoDiaMes = 32;

    //Saidas Futuras 


    $FuturasSaidas = $conn->prepare($sql = "SELECT *  FROM `transacoes` WHERE `user_id` = ? AND DAY(data_pagamento) BETWEEN ? AND ? AND MONTH(data_pagamento) = ? AND YEAR(data_pagamento) = ? AND `tipo_de_transi` = 1 ");

    $FuturasSaidas->bind_param("sssss",$idUser, $dia,$ultimoDiaMes,$mes,$ano);
    
    $FuturasSaidas->execute();
    $result5 = $FuturasSaidas->get_result();
    
    if($result5->num_rows > 0) {
    
        $FuturasSaidas = 0 ;
    
        while($somaSaida = $result5->fetch_assoc()){
        $FuturasSaidas += $somaSaida['valor'];
    
    // Aqui esta uma formatação meia boca rs para colocar o valore em reai
    
    
           }
    }else{
            $FuturasSaidas = 0;
    
    }    

    // Saldo 

    $FuturasSaidas = $FuturasSaidas *-1;
    $soma_total_saida = $soma_total_saida * -1;
    $saldo = $soma_total + $soma_total_saida;




?>

