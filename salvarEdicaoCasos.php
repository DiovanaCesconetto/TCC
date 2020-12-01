<?php

include('conexao.php');

$data =  $_POST['data'];
$observacoes = $_POST['observacoes'];
$id_registro = $_POST['id_registro'];

$sql = "UPDATE registro_caso set observacoes = :observacoes , data = :data WHERE id_registro = '$id_registro' ";
$atualizar = $conn->prepare( $sql );
$atualizar->bindParam( ':data', $data);
$atualizar->bindParam( ':observacoes', $observacoes);
$resultado = $atualizar->execute();

if ( ! $resultado )
{
    var_dump( $atualizar->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Atualização do caso realizado com sucesso!');window.location.href='ConsultaCasos.php';</script>"; 
}


?>