<?php 


require_once 'conexao.php';



session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];
    
} else {
    header('Location: ../../');
    exit();
}

$imgPerfil = $conn->prepare("SELECT * FROM `conta` WHERE `user_id` = ?");
$imgPerfil->bind_param("s", $idUser);
$imgPerfil->execute();

$ResutimgPerfil = $imgPerfil->get_result();

if($ResutimgPerfil->num_rows > 0) {
    while($row = $ResutimgPerfil->fetch_assoc()) {
        $PathImg = $row['path'];
        $Diretory = $row['directory'];
        
    }
    // Corrigir o caminho do arquivo
    $Diretory = str_replace("D:/aplicacao", "", $Diretory);


    echo"
    <style>
    #fotoPerfil {
        background: url('$Diretory$PathImg');
        background-position: center center;
        background-size: cover;
    
    }

    #model #fotoPefil  {
        background: url('$Diretory$PathImg');
        background-position: center center;
        background-size: cover;
    }

    </style>";
}

?>