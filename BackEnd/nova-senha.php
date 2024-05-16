<?php 

session_start();

// entrada da senha do html
$Nchave = $_POST['Nchave'];



if (isset($_SESSION['emailUser'])) { // captura da varivael php de outro arquivo ja salvo
    $email = $_SESSION['emailUser'];
    $chave_string = $_SESSION['ChaveRecu'];

}else{
    echo "Deu Errado";
}

if ($Nchave === $chave_string) {

    header("location: ../nova-senha?return=alterar-senha");
    exit();



}else {
    
    header("location: ../nova-senha?erro=chave_incorreta");
    exit();
}




?>
