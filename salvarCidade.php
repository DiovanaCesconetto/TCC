<?php

include('conexao.php');
$nome =  $_POST['nome'];
$estado = $_POST['estado'];

$sql = "INSERT INTO Cidade (nome, estado) VALUES (:nome, :estado)";

$inserir = $conn->prepare( $sql );

$inserir->bindParam( ':nome', $nome);
$inserir->bindParam( ':estado', $estado);

$resultado = $inserir->execute();

if ( ! $resultado )
{
    var_dump( $inserir->errorInfo() );
    exit;
}else{
    echo "Cadastro Realizado Com Sucesso";
}


?>