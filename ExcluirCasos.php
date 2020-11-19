<?php

include('conexao.php');

$id_registro = $_GET['id_registro'];

$sql = "DELETE from registro_caso  WHERE id_registro = '$id_registro' ";
$excluir = $conn->prepare( $sql );
$resultado = $excluir->execute();

if ( ! $resultado )
{
    var_dump( $excluir->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Exclusão do caso realizada com sucesso!');window.location.href='consultaCasos.php';</script>"; 
}


?>