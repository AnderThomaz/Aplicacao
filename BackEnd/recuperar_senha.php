<?php 
session_start();

require_once 'conexao.php';

$email = $_POST['email'];


$stmt = $conn->prepare("SELECT email FROM login WHERE email = ?");
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();

$servidorEmail = "http://localhost:5000/recuperacaoSenha";

if ($result->num_rows > 0) {
    
    $chave = random_bytes(16);
    $chave_string = base64_encode($chave);


    $InicarSe = curl_init($servidorEmail);
    curl_setopt($InicarSe, CURLOPT_POST, true);

    // Combine os dados em um único array associativo
    curl_setopt($InicarSe, CURLOPT_POSTFIELDS, ['chave' => $chave_string, 'email' => $email]);

    curl_setopt($InicarSe, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($InicarSe);
    
    curl_close($InicarSe);


    $_SESSION['emailUser'] = $email;
    $_SESSION['ChaveRecu'] = $chave_string;

    header("Location: ../nova-senha");

}else {
    header("Location: ../esqueci-senha?erro=email_invalido");
}

$_SESSION['emailUser'] = $email;

$stmt->close();
$conn->close();
?>