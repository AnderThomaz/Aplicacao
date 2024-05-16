<?php
    require_once '../BackEnd/favicon.php';
    require_once '../BackEnd/app/deshbord.php';
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Control</title>
    <link rel="stylesheet" href="../../estilo/StyleApp/style.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/midiaQuery.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../estilo/StyleApp/teste.scss">
</head>
<body>
    <header>
        <span onclick="abrir_menu" id="iconmenu" class="material-symbols-outlined">
            menu
        </span>
        <h1>DASHBOARD</h1>
        <select name="mes" id="SelectMes">
            <option value="1" <?php if($mes == 1) {echo "selected";} ?>>January</option>
            <option value="2"<?php if($mes == 2) {echo "selected";} ?>>February</option>
            <option value="3"<?php if($mes == 3) {echo "selected";} ?>>March</option>
            <option value="4"<?php if($mes == 4) {echo "selected";} ?>>April</option>
            <option value="5"<?php if($mes == 5) {echo "selected";} ?>>May</option>
            <option value="6"<?php if($mes == 6) {echo "selected";} ?>>June</option>
            <option value="7"<?php if($mes == 7) {echo "selected";} ?>>July</option>
            <option value="8"<?php if($mes == 8) {echo "selected";} ?>>August</option>
            <option value="9"<?php if($mes == 9) {echo "selected";} ?>>September</option>
            <option value="10"<?php if($mes == 10) {echo "selected";} ?>>October</option>
            <option value="11"<?php if($mes == 11) {echo "selected";} ?>>November</option>
            <option value="12"<?php if($mes == 12) {echo "selected";} ?>>December</option>
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
            <li><img src="../../estilo/StyleApp/icon/dashboard_FILL1_wght200_GRAD0_opsz24.svg" alt=""> Dashboard</a>
            <a href="recebimento">
            <li><img src="../../estilo/StyleApp/icon/paid_FILL1_wght600_GRAD0_opsz24.svg" alt="">Income</a>
            <a href="despesas">
            <li><img src="../../estilo/StyleApp/icon/shopping_bag_FILL1_wght200_GRAD0_opsz24.svg" alt="">Expenses</a>
            <a href="relatorio">
            <li><img src="../../estilo/StyleApp/icon/equalizer_FILL1_wght200_GRAD0_opsz24.svg" alt="">Report</a>
            <a href="conta">
            <li><img src="../../estilo/StyleApp/icon/person_FILL1_wght200_GRAD0_opsz24.svg" alt="">Account</a>
            <a href="../BackEnd/app/logout.php">
            <li><img src="../../estilo/StyleApp/icon/exit_to_app_FILL1_wght400_GRAD0_opsz24.svg" alt="">Logout</a>
        </ul>
    </menu>
    <main> 
        <div id="dastbord">
            <div class="valores" id="entradas">
                <p>Income</p>
                <p class="reais">R$ <?php echo $soma_total = number_format($soma_total,2, ',', '.') ?></p>
            </div>
            <div class="valores" id="saidas">
                <p>Expenses</p>
                <p class="reais" id="saidas">R$ <?php echo $soma_total_saida = number_format($soma_total_saida, 2, ',', '.') ?></p>
            </div>
            <div class="valores" id="saldo">
                <p>Balance</p>
                <p class="reais">R$ <?php echo $saldo = number_format($saldo, 2, ',', '.') ?></p>
            </div>
        </div>
        <div id="grafico">
            <div id="infor">
                <span id="titulos">
                    <p>Description</p>
                    <p id="dtRece">Date</p>
                    <p>Value</p>
                </span>
                <ul>
                <?php require_once '../BackEnd/app/grafico.php'?>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        <p>Developed by</p> <img src="/app/img/LogoDev.png" alt=""> 
    </footer>
</body>
<script src="/js/selecao_mes.js"></script>
<script src="/js/menu.js"></script>
</html>



