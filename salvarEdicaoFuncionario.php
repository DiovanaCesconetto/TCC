<?php

include('conexao.php');

$nome =  $_POST['nome'];
$senha = MD5($_POST['senha']);
$email = $_POST['email'];
$id_funcionario = $_POST['id_funcionario'];
if( !empty($_POST['usuario_admin']) ){
    $usuarioAdmin = 1;
}else{
    $usuarioAdmin = 0;
}
  
if( empty($_POST['nome']) || empty($_POST['senha']) || empty($_POST['email']) ){
    echo "<script language= 'javascript' type='text/javascript'>alert('É necessário informar nome, senha e e-mail');window.location.href='consultaFuncionario.php';</script>";
  }else{

    $sql = "UPDATE funcionario set nome = :nome , senha = :senha, email = :email, usuario_admin = :usuario_admin
    WHERE id_funcionario = '$id_funcionario' ";
    echo "dfkkk ".$sql ;
    $atualizar = $conn->prepare( $sql );
    $atualizar->bindParam( ':nome', $nome);
    $atualizar->bindParam( ':senha', $senha);
    $atualizar->bindParam( ':email', $email);
    $atualizar->bindParam( ':usuario_admin', $usuarioAdmin);
    $resultado = $atualizar->execute();

    if ( ! $resultado )
    {
        var_dump( $atualizar->errorInfo() );
        exit;
    }else{
        echo "<script language= 'javascript' type='text/javascript'>alert('Atualização do funcionario realizado com sucesso!');window.location.href='consultaFuncionario.php';</script>"; 
    }
}

?>