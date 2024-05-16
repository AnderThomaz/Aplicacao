<?php 
require_once '../BackEnd/favicon.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../../estilo/StyleApp/style.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/perfil.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/midiaQuery.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/conta/modelUpload.css">
    <link rel="stylesheet" href="../../estilo/StyleApp/conta/EditorDados.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>    
    <?php 
    require_once '../BackEnd/app/conta/BuscaImgPerfil.php'
    ?>
</head>
<body>
    
    <header>
        <span onclick="abrir_menu()" id="iconmenu" class="material-symbols-outlined">
            menu
            </span>

        <h1>PERFIL</h1>

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
        <div id="fundo">
            <div id="dados">
                <div id="fotoPerfil" onclick="abrir_UploadPefil()">
                    <span onclick="abrir_UploadPefil()" id="uploadBut" class="material-symbols-outlined">
                    settings
            </span>
                </div>

                <?php 
                    require_once '../BackEnd/app/conta/BuscarDados.php';

                ?>
            </div>
            
        </div>
    </main>

    <div id= UploadImg >
        <div id="model">
            <div id="fotoPefil"></div>
            <form action="../BackEnd/app/conta/uploadPefil" method="post" enctype="multipart/form-data">
            <label for="UploadPerfil">Adicionar foto de perfil</label>
            <input type="file" name="UploadPerfil" id="UploadPerfil" accept="image/jpeg, image/png">
            <button type="submit">Salvar</button>
            
            </form>
        </div>
    </div>
    

    <footer>
        <p>Desenvolvido por  </p> <img src="/app/img/LogoDev.png" alt=""> 
    </footer>
</body>

    <script src="../../js/menu.js"></script>
    <script src="../../js/conta/UploadPerfil.js"></script>
</html>

