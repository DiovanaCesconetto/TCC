<?php

include('conexao.php');

$nome =  $_POST['nome'];
$cidade = $_POST['id_cidade'];
$id_bairro = $_POST['id_bairro'];

$sql = "UPDATE bairro set nome = :nome , id_cidade = :cidade WHERE id_bairro = '$id_bairro' ";
$atualizar = $conn->prepare( $sql );
$atualizar->bindParam( ':nome', $nome);
$atualizar->bindParam( ':cidade', $cidade);
$resultado = $atualizar->execute();

if ( ! $resultado )
{
    var_dump( $atualizar->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Atualização do Bairro realizado com sucesso!');window.location.href='painel.php';</script>"; 
}


?>