<?php 
$server = 'localhost';
$usuario = 'root';
$senhaB = '@Nd50102030';
$banco = 'dados';


// conexao com banco de dados

$conn = new mysqli($server, $usuario,$senhaB, $banco);

if($conn->connect_error){
    die("Falha ao se comunicar com banco de dados: ". $conn->connect_error);

}
?>