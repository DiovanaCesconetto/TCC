<?php

include('conexao.php');

$id_bairro = $_GET['id_bairro'];

$sql = "DELETE from bairro  WHERE id_bairro = '$id_bairro' ";
$excluir = $conn->prepare( $sql );
$resultado = $excluir->execute();

if ( ! $resultado )
{
    var_dump( $excluir->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Exclusão do Bairro realizada com sucesso!');window.location.href='painel.php';</script>"; 
}


?>