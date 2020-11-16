<?php

include('conexao.php');

$id_cidade = $_GET['id_cidade'];

$sql = "DELETE from cidade  WHERE id_cidade = '$id_cidade' ";
$excluir = $conn->prepare( $sql );
$resultado = $excluir->execute();

if ( ! $resultado )
{
    var_dump( $excluir->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Exclusão da Cidade realizada com sucesso!');window.location.href='painel.php';</script>"; 
}


?>