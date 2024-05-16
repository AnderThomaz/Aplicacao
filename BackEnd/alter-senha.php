<?php 

session_start();

require_once 'conexao.php';

if(empty($_POST['Nsenha']) || empty($_SESSION['emailUser'])) {

    header("Location: ../");
    exit;
}


$Nsenha = $_POST['Nsenha'];
$email = $_SESSION['emailUser'];



$hashSenha = password_hash($Nsenha, PASSWORD_DEFAULT);




$sql = "UPDATE login SET senha = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $hashSenha, $email);

if ($stmt->execute()) {
    header("Location: /?return=senha-alterada");
    exit;
} else {
    echo "Erro ao alterar a senha: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>