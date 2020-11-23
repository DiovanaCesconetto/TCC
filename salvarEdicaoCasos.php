<?php

include('conexao.php');

$nome =  $_POST['nome'];
$registro_caso = $_POST['id_registro'];
$id_registro = $_POST['id_registro'];

$sql = "UPDATE registro_caso set nome = :nome , id_registro = :funcionario WHERE id_registro = '$id_registro' ";
$atualizar = $conn->prepare( $sql );
$atualizar->bindParam( ':nome', $nome);
$atualizar->bindParam( ':data', $data);
$atualizar->bindParam( ':observacoes', $observacoes);

$resultado = $atualizar->execute();

if ( ! $resultado )
{
    var_dump( $atualizar->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Atualização do cidade realizado com sucesso!');window.location.href='painel.php';</script>"; 
}


?>