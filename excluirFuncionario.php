<?php

include('conexao.php');

$id_funcionario = $_GET['$id_funcionario'];

$sql = "DELETE from Funcionario  WHERE id_funcionario = '$id_funcionario' ";
$excluir = $conn->prepare( $sql );
$resultado = $excluir->execute();

if ( ! $resultado )
{
    var_dump( $excluir->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Exclusão do funcionário realizada com sucesso!');window.location.href='consultaFuncionario.php';</script>"; 
}


?>