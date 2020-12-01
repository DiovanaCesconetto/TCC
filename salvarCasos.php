<?php

include('conexao.php');
session_start();


$id_paciente =  $_POST['id_paciente'];
$data =  $_POST['data_caso'];
$observacoes = $_POST['observacoes'];
$id_funcionario = $_SESSION['id_funcionario'];

$sql = "INSERT INTO registro_caso ( observacoes, Data, Id_funcionario, Id_paciente) 
    VALUES ( :observacoes, :data_caso, :id_funcionario, :id_paciente)";

$inserir = $conn->prepare( $sql );

$inserir->bindParam( ':observacoes', $observacoes);
$inserir->bindParam( ':data_caso', $data);
$inserir->bindParam( ':id_funcionario', $id_funcionario);
$inserir->bindParam( ':id_paciente', $id_paciente);


$resultado = $inserir->execute();

if ( ! $resultado )
{
    var_dump( $inserir->errorInfo() );
    exit;
}else{
    echo "<script language= 'javascript' type='text/javascript'>alert('Cadastro de Caso realizado com sucesso!');window.location.href='ConsultaCasos.php';</script>"; 
}


?>