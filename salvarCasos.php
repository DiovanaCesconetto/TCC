<?php

include('conexao.php');

$nome =  $_POST['nome'];
$data =  $_POST['data_caso'];
$observacoes = $_POST['observacoes'];

$sql = "INSERT INTO Casos ( nome, data_caso, observacoes) VALUES ( :nome, :data_caso, :observacoes)";

$inserir = $conn->prepare( $sql );

$inserir->bindParam( ':nome', $nome);
$inserir->bindParam( ':data_caso', $data_caso);
$inserir->bindParam( ':observacoes', $observacoes);

$resultado = $inserir->execute();

if ( ! $resultado )
{
    var_dump( $inserir->errorInfo() );
    exit;
}else{
    echo "Cadastro Realizado Com Sucesso";
}


?>