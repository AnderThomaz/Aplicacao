<?php 

    require_once 'conexao.php';
    
    session_start();

    if (isset($_FILES['UploadPerfil']) && $_FILES['UploadPerfil']['size'] == 0) {
        // Arquivo enviado está vazio
        header("Location: ../../../app/conta ");
        exit();
    } else {
// Verifica se o arquivo foi enviado sem erros
    if(isset($_FILES['UploadPerfil']) && $_FILES['UploadPerfil']['error'] === 0) {
            // Move o arquivo temporário para um local permanente
        $nomeArquivo = $_FILES['UploadPerfil']['name'];

        $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION); // Obtém a extensão do arquivo

        // Gera um nome aleatório único para o arquivo
        $nomeAleatorio = uniqid() . '.' . $extensao;

        $nomeArquivo = $nomeAleatorio;

        $localTemporario = $_FILES['UploadPerfil']['tmp_name'];
        $Diretory = 'D:/aplicacao/app/fotoPerfil/';
        $caminhoDestino = 'D:/aplicacao/app/fotoPerfil/' . $nomeAleatorio;

    if(move_uploaded_file($localTemporario, $caminhoDestino)) {
        echo "Arquivo enviado com sucesso. Caminho: " . $caminhoDestino;
    } else {
        echo "Erro ao mover o arquivo para o destino.";
    }
    }
}

    // Obtém o ID do usuário da sessão
    $idUser = $_SESSION['idUser'];
    
    // Prepara e executa a consulta para verificar se há uma entrada existente
    $imgPerfil = $conn->prepare("SELECT * FROM `conta` WHERE `user_id` = ?");
    $imgPerfil->bind_param("s", $idUser);
    $imgPerfil->execute();
    
    // Verifica se houve erro na execução da consulta
    if ($imgPerfil === false) {
        die("Erro ao executar a consulta: " . $conn->error);
    }
    
    // Obtém o resultado da consulta
    $ResultImg = $imgPerfil->get_result();
    
    // Verifica se houve erro ao obter o resultado
    if ($ResultImg === false) {
        die("Erro ao obter o resultado da consulta: " . $conn->error);
    }
    
    // Verifica se há uma entrada para o usuário na tabela
    if ($ResultImg->num_rows > 0) {
        // Atualiza a entrada existente
        $updateSImg = $conn->prepare("UPDATE `conta` SET `path` = ?, `directory` = ?, `date` = CURRENT_TIMESTAMP WHERE `user_id` = ?");
        $updateSImg->bind_param("sss", $nomeAleatorio, $Diretory, $idUser);
        $updateSImg->execute();
    
        // Verifica se houve erro na atualização
        if ($updateSImg === false) {
            die("Erro ao atualizar a entrada: " . $conn->error);

        }
    } else {
        // Insere uma nova entrada
        $imgPerfil = $conn->prepare("INSERT INTO `conta`(`user_id`, `path`, `directory`) VALUES (?,?,?)");
        $imgPerfil->bind_param("sss", $idUser, $nomeAleatorio, $Diretory);
        $imgPerfil->execute();
    
        // Verifica se houve erro na inserção
        if ($imgPerfil === false) {
            die("Erro ao inserir uma nova entrada: " . $conn->error);

            header("Location: ../../../app/conta ");
            exit();
        }
    }
    
    // Fecha a conexão com o banco de dados
    $conn->close();

    header("Location: ../../../app/conta ");
    exit();

    
    ?>
    




