

I<?php

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
    echo "<script language= 'javascript' type='text/javascript'>alert('Cadastro de Cidade realizado com sucesso!');window.location.href='painel.php';</script>"; 
}


?>