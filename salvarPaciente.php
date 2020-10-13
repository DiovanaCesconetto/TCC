<?php

include('conexao.php');
$nome =  $_POST['nome'];
$cpf = $_POST['CPF'];
$RG = $_POST['RG'];
$email = $_POST['email'];
$data_nasc = $_POST['data_nasc'];

$sql = "INSERT INTO Paciente (nome, cpf, Rg, email, data_nasc) VALUES (:nome, :cpf, :Rg, :email, :data_nasc)";

$inserir = $conn->prepare( $sql );

$inserir->bindParam( ':nome', $nome);
$inserir->bindParam( ':cpf', $cpf);
$inserir->bindParam( ':Rg', $Rg);
$inserir->bindParam( ':email', $email);
$inserir->bindParam( ':data_nasc', $data_nasc);

$resultado = $inserir->execute();

if ( ! $resultado )
{
    var_dump( $inserir->errorInfo() );
    exit;
}else{
    echo "Cadastro Realizado Com Sucesso";
}


?>