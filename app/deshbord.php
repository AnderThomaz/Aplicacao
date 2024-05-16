<?php
    require_once '../BackEnd/favicon.php';
    require_once '../BackEnd/app/deshbord.php';

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

    
    
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Financeiro</title>
    <link rel="stylesheet" href="../../estilo/StyleApp/style.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/midiaQuery.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 

</head>
<body>
    

    <header>
        <span onclick="abrir_menu" id="iconmenu" class="material-symbols-outlined">
            menu
            </span>

        <h1>DESHBORD</h1>

        <select name="mes" id="SelectMes">
                <option value="1" <?php if($mes == 1) {echo "selected";} ?>>&nbsp;&nbsp;Janeiro&nbsp;&nbsp;</option>
                <option value="2"<?php if($mes == 2) {echo "selected";} ?>>&nbsp;&nbsp;Fevereiro&nbsp;&nbsp;</option>
                <option value="3"<?php if($mes == 3) {echo "selected";} ?>>&nbsp;&nbsp;Março&nbsp;</option>
                <option value="4"<?php if($mes == 4) {echo "selected";} ?>>&nbsp;&nbsp;Abril&nbsp;</option>
                <option value="5"<?php if($mes == 5) {echo "selected";} ?>>&nbsp;&nbsp;Maio&nbsp;</option>
                <option value="6"<?php if($mes == 6) {echo "selected";} ?>>&nbsp;&nbsp;Junho&nbsp;</option>
                <option value="7"<?php if($mes == 7) {echo "selected";} ?>>&nbsp;&nbsp;Julho&nbsp;</option>
                <option value="8"<?php if($mes == 8) {echo "selected";} ?>>&nbsp;&nbsp;Agosto&nbsp;&nbsp;</option>
                <option value="9"<?php if($mes == 9) {echo "selected";} ?>>&nbsp;&nbsp;Setembro&nbsp;&nbsp;</option>
                <option value="10"<?php if($mes == 10) {echo "selected";} ?>>&nbsp;&nbsp;Outubro&nbsp;&nbsp;</option>
                <option value="11"<?php if($mes == 11) {echo "selected";} ?>>&nbsp;&nbsp;Novembro&nbsp;&nbsp;</option>
                <option value="12"<?php if($mes == 12) {echo "selected";} ?>>&nbsp;&nbsp;Dezembro&nbsp;&nbsp;</option>

            </select>

        <span id="configuracoes" class="material-symbols-outlined"> 
            settings
            </span>
    </header>

    <menu id="menu" class="menu">
        <div id="header_menu">
            <span class="material-symbols-outlined" id="closemenu">
            close
            </span>

            

            
        </div>
        <ul>    
                <a href="deshbord">
                <li><img src="../../estilo/StyleApp/icon/dashboard_FILL1_wght200_GRAD0_opsz24.svg" alt=""> Dashbord</a>
                <a href="recebimento">
                <li><img src="../../estilo/StyleApp/icon/paid_FILL1_wght600_GRAD0_opsz24.svg" alt="">Receita</a>
                <a href="despesas">
                <li><img src="../../estilo/StyleApp/icon/shopping_bag_FILL1_wght200_GRAD0_opsz24.svg" alt="">Despesas</a>
                <a href="relatorio">
                <li><img src="../../estilo/StyleApp/icon/equalizer_FILL1_wght200_GRAD0_opsz24.svg" alt="">Relátorio</a>
                <a href="conta">
                <li><img src="../../estilo/StyleApp/icon/person_FILL1_wght200_GRAD0_opsz24.svg" alt="">Conta</a>
                <a href="../BackEnd/app/logout">
                <li><img src="../../estilo/StyleApp/icon/exit_to_app_FILL1_wght400_GRAD0_opsz24.svg" alt="">Logout</a>
        </ul>

    </menu>

    <main> 
        <div id="dastbord">
            <div class="valores" id="entradas">
                <p>Entradas</p>
                <p class="reais">R$ <?php echo $soma_total = number_format($soma_total,2, ',', '.') ?></p>
            </div>

            <div class="valores" id="saidas">
                <p>Saidas</p>
                <p class="reais" id="saidas">R$ <?php echo $soma_total_saida = number_format($soma_total_saida, 2, ',', '.') ?></p>
            </div>

            <div class="valores" id="saldo">
                <p>Saldo Mensal</p>
                <p class="reais">R$ <?php echo $saldo = number_format($saldo, 2, ',', '.') ?></p>
            </div>
        </div>

        <div id="dastbord2" >


            <div class="valores" id="entradas">
                <p>A receber R$ <?php echo $FuturasEntra = number_format($FuturasEntra, 2, ',', '.');?></p>
            </div>

            <div class="valores" id="saidas">
            <p>A pagar R$ <?php echo $FuturasSaidas = number_format($FuturasSaidas, 2, ',', '.');?></p>
            </div>

            <div class="valores" id="nada">

            </div>
        
        </div>

        
        <div id="grafico">

            <div id="infor">
                <span id="titulos">
                    <p>Descrição</p>
                    <p id="dtRece">Data</p>
                    <p>Valor</p>
                </span>

                <ul>
                <?php require_once '../BackEnd/app/grafico.php'?>
                </ul>
            </div>

            <div id="Valores">
                <span id="titulos">
                    <p>Saldo Anterior</p>


                </span>
            </div>
            
        </div>

    </main>

    <div id="detalhe_lanca" >

            <p>DETALHES</p>

            <span class="material-symbols-outlined" id="closeInfoLan" onclick="FecharInformacao()">
            
            close
            </span>

            <div id="detalhes">
                


                <iframe src="../app/deshbord-app/InforDetahes" frameborder="0" scrolling="no" id="IframeDetalhes">

                </iframe>
                


            </div>
            
    </div>


    <footer>
        <p>Desenvolvido por </p> <img src="/app/img/LogoDev.png" alt=""> 
    </footer>
</body>
    <script src="/js/selecao_mes.js"></script>
    <script src="/js/menu.js"></script>
    <script src="/js/deshbord-app/detalhes.js"></script>

    

</html>