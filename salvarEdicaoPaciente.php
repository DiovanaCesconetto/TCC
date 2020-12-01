<?php
session_start();
include('conexao.php');

$nome =  $_POST['nome'];
$cpf = $_POST['CPF'];
$rg = $_POST['RG'];
$email = $_POST['email'];
$data_nasc = $_POST['data_nasc'];
$id_funcionario = $_SESSION['id_funcionario'];

$numero = $_POST['numero'];
$cep = $_POST['CEP'];
$rua = $_POST['rua'];
$id_bairro = $_POST['bairro'];
$id_paciente = $_POST['id_paciente'];
$id_endereco = $_POST['id_endereco'];



if( empty($_POST['nome']) || empty($_POST['CPF']) || empty($_POST['email']) ){
    echo "<script language= 'javascript' type='text/javascript'>alert('É necessário informar nome, senha e e-mail');window.location.href='consultaPaciente.php';</script>";
  }else{
    $sqlEndereco = "UPDATE endereco set  numero = :numero, cep = :cep, rua = :rua, id_bairro = :id_bairro 
    WHERE id_endereco = '$id_endereco' ";
    $atualizarEndereco = $conn->prepare( $sqlEndereco );
    $atualizarEndereco->bindParam( ':numero', $numero);
    $atualizarEndereco->bindParam( ':cep', $cep);
    $atualizarEndereco->bindParam( ':rua', $rua);
    $atualizarEndereco->bindParam( ':id_bairro', $id_bairro);
    $resultadoEndereco = $atualizarEndereco->execute();
    if ( $resultadoEndereco ){
        $resultado = true;
        $sqlPaciente = "UPDATE paciente  set nome = :nome, cpf = :cpf, Rg = :Rg, email = :email, data_nasc = :data_nasc, id_funcionario = :id_funcionario
        WHERE id_paciente = '$id_paciente' ";
        $atualizarPaciente = $conn->prepare( $sqlPaciente );
        $atualizarPaciente->bindParam( ':nome', $nome);
        $atualizarPaciente->bindParam( ':cpf', $cpf);
        $atualizarPaciente->bindParam( ':Rg', $rg);
        $atualizarPaciente->bindParam( ':email', $email);
        $atualizarPaciente->bindParam( ':data_nasc', $data_nasc);
        $atualizarPaciente->bindParam( ':id_funcionario', $id_funcionario);
        $resultadoPaciente = $atualizarPaciente->execute();
        if ( $resultadoPaciente ){
            $resultado = true;
        }else{
            var_dump( $atualizarPaciente->errorInfo() );
            $resultado = false;
            exit;
        }

    }else{
        var_dump( $atualizarEndereco->errorInfo() );
        $resultado = false;
        exit;
    }
  
    if ( ! $resultado )  {
        var_dump( $atualizar->errorInfo() );
        $resultado = false;
        exit;
    }else{
            echo "<script language= 'javascript' type='text/javascript'>alert('Atualização do paciente realizada com sucesso!');window.location.href='consultaPaciente.php';</script>"; 
    }
}

?>