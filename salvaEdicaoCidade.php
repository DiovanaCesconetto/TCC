<?php

include('conexao.php');

$nome =  $_POST['nome'];
$cidade = $_POST['id_cidade'];
$id_cidade = $_POST['id_cidade'];

$sql = "UPDATE cidade set nome = :nome , id_cidade = :cidade WHERE id_cidade = '$id_cidade' ";
$atualizar = $conn->prepare( $sql );
$atualizar->bindParam( ':nome', $nome);
$atualizar->bindParam( ':cidade', $cidade);
$resultado = $atualizar->execute();

if ( ! $resultado )
{
    var_dump( $atualizar->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Atualização do cidade realizado com sucesso!');window.location.href='painel.php';</script>"; 
}


?>