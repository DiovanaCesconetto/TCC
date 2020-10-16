<?php

include('conexao.php');
$nome =  $_POST['nome'];
$cidade = $_POST['cidade'];

$sql = "INSERT INTO Bairro (nome, cidade) VALUES (:nome, :cidade)";

$inserir = $conn->prepare( $sql );

$inserir->bindParam( ':nome', $nome);
$inserir->bindParam( ':cidade', $estado);

$resultado = $inserir->execute();

if ( ! $resultado )
{
    var_dump( $inserir->errorInfo() );
    exit;
}else{
    echo "Cadastro Realizado Com Sucesso";
}


?>