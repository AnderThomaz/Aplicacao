<?php
// Recebe a variável enviada por JavaScript

session_start();

$data = json_decode(file_get_contents("php://input"));

$selectedOption = 0;

if(isset($data->selectedOption)) {
  $selectedOption = $data->selectedOption;
  // Faça o que desejar com a variável $selectedOption, por exemplo, imprima na tela
  echo "Opção selecionada: " . $selectedOption;
} else {
  echo "Nenhuma opção selecionada";
  
}

    $_SESSION['mesSelect'] = $selectedOption;
    

    
?>