<?php

include('conexao.php');

$nome =  $_POST['nome'];
$funcionario = $_POST['id_funcionario'];
$id_funcionario = $_POST['id_funcionario'];

$sql = "UPDATE funcionario set nome = :nome , id_funcionario = :funcionario WHERE id_funcionario = '$id_funcionario' ";
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