<?php

include('conexao.php');

$nome =  $_POST['nome'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);

$sql = "INSERT INTO Funcionario (nome, email, senha) VALUES (:nome, :email, :senha)";

$inserir = $conn->prepare( $sql );

$inserir->bindParam( ':nome', $nome);
$inserir->bindParam( ':email', $email);
$inserir->bindParam( ':senha', $senha);

$resultado = $inserir->execute();

if ( ! $resultado )
{
    var_dump( $inserir->errorInfo() );
    exit;
}else{
    echo "Cadastro Realizado Com Sucesso";
    header('Location: painel.php');
}


?>