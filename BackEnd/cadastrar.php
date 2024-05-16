<?php 

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
// Configuracões de credenciais

require_once 'conexao.php';

$verifica_email = $conn->prepare("SELECT * FROM login WHERE email = ?");
$verifica_email->bind_param("s", $email);
$verifica_email->execute();
$verifica_email->store_result();

if ($verifica_email->num_rows > 0) {
    // O e-mail já está cadastrado, redirecione para a página de cadastro com uma mensagem de erro
    $verifica_email->close();
    $conn->close();
    header("Location: ../cadastro?erro=email_existente");
    exit();
}


$hashSenha = password_hash($senha, PASSWORD_DEFAULT);
// Se o e-mail não estiver cadastrado, proceda com a inserção
$verifica_email->close();

$smtp = $conn->prepare("INSERT INTO login (nome, email, senha) VALUES (?,?,?)");
$smtp->bind_param("sss",$nome, $email,$hashSenha );

if($smtp->execute()){
    
}else{

    // Se ocorrer um erro na inserção, redirecione para a página de cadastro com uma mensagem de erro
    header("Location: ../cadastro?erro=insercao_falhou");
    exit();
    
}

$smtp->close();
$conn->close();

header("Location: ../?return=cadastro-efetuado");
exit();

?>


