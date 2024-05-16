<?php 

$nome = "Anderson";
$email = "Anderson.thomaz@gmail.com";
$senha = "12345";
// Configuracões de credenciais

require_once 'conexao.php';

$smtp = $conn->prepare("INSERT INTO login (nome, email, senha) VALUES (?,?,?)");
$smtp->bind_param("sss",$nome, $email,$senha );

if($smtp->execute()){
    
}else{
    
}

$smtp->close();
$conn->close();

?>