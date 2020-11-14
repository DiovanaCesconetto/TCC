<?php

include('conexao.php');
$nome =  $_POST['nome'];
$cidade = $_POST['id_cidade'];

$sql = "INSERT INTO bairro (nome, id_cidade) VALUES (:nome, :cidade)";

$inserir = $conn->prepare( $sql );

$inserir->bindParam( ':nome', $nome);
$inserir->bindParam( ':cidade', $cidade);

$resultado = $inserir->execute();

if ( ! $resultado )
{
    var_dump( $inserir->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Cadastro de Bairro realizado com sucesso!');window.location.href='painel.php';</script>"; 
}


?>