<?php

require_once 'conexao.php';

session_start();// cria uma vaviavel no servidor e posso acessar em outro arquivo php

$email = $_POST['email'];
$senha = $_POST['senha'];


// Verificaão de login - Para acessar a pagina de login 
if (empty($email)) {

    header("Location: ../index");
    exit();
}else {
    
}

$sql = "SELECT senha  FROM `login` WHERE `email` = ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($hashSenha);
$stmt->fetch();

if ($hashSenha !== null && password_verify($senha, $hashSenha)) {

        $_SESSION['emailUser'] = $email;
        header("Location: ../app/deshbord   ");
        exit();

}else{
    //Credenciais incorretas, redirecione o usuario a tela de login
    header("Location: ../index?erro=credencias_incorreta ");
    exit(); // Certifique-se de sair do script após o redirecionamento

}



$stmt->close();
$conn->close();