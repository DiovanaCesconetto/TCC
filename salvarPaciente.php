<?php

include('conexao.php');
$nome =  $_POST['nome'];
$cpf = $_POST['CPF'];
$rg = $_POST['RG'];
$email = $_POST['email'];
$data_nasc = $_POST['data_nasc'];

$sql = "INSERT INTO Paciente (nome, cpf, Rg, email, data_nasc) VALUES (:nome, :cpf, :Rg, :email, :data_nasc)";

$inserir = $conn->prepare( $sql );

$inserir->bindParam( ':nome', $nome);
$inserir->bindParam( ':cpf', $cpf);
$inserir->bindParam( ':Rg', $rg);
$inserir->bindParam( ':email', $email);
$inserir->bindParam( ':data_nasc', $data_nasc);

$resultado = $inserir->execute();

if ( ! $resultado )
{
    var_dump( $inserir->errorInfo() );
    exit;
}else{
    echo "<script>alert('Cadastro Realizado Com Sucesso')</script>";
}


?>