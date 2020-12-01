<?php

include('conexao.php');

$id_paciente = $_GET['id_paciente'];

$sql = "DELETE from paciente  WHERE id_paciente = '$id_paciente' ";
$excluir = $conn->prepare( $sql );
$resultado = $excluir->execute();

if ( ! $resultado )
{
    var_dump( $excluir->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Exclusão do paciente realizada com sucesso!');window.location.href='consultaPaciente.php';</script>"; 
}


?>