<?php
session_start();

require_once 'conexao.php';
require_once 'deshbord.php';

// Destruir todas as variáveis de sessão
session_destroy();

// Redirecionar o usuário para a página inicial ou qualquer outra página desejada após o logout
header('Location: ../../../');
exit();
?>