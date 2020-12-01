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

$sqlEndereco = "INSERT INTO endereco ( numero, cep, rua, id_bairro ) VALUES ( :numero, :cep, :rua, :id_bairro)";
$inserirEndereco = $conn->prepare( $sqlEndereco );
$inserirEndereco->bindParam( ':numero', $numero);
$inserirEndereco->bindParam( ':cep', $cep);
$inserirEndereco->bindParam( ':rua', $rua);
$inserirEndereco->bindParam( ':id_bairro', $id_bairro);
$resultadoEndereco = $inserirEndereco->execute();
$id_endereco =  intval( $conn->lastInsertId() ) ;

if ( $resultadoEndereco ){
   
    $resultado = true;

    $sqlPaciente = "INSERT INTO Paciente (nome, cpf, Rg, email, data_nasc, id_funcionario, id_endereco ) VALUES (:nome, :cpf, :Rg, :email, :data_nasc, :id_funcionario, :id_endereco)";
    $inserirPaciente = $conn->prepare( $sqlPaciente );
    $inserirPaciente->bindParam( ':nome', $nome);
    $inserirPaciente->bindParam( ':cpf', $cpf);
    $inserirPaciente->bindParam( ':Rg', $rg);
    $inserirPaciente->bindParam( ':email', $email);
    $inserirPaciente->bindParam( ':data_nasc', $data_nasc);
    $inserirPaciente->bindParam( ':id_funcionario', $id_funcionario );
    $inserirPaciente->bindParam( ':id_endereco', $id_endereco);
    $resultadoPaciente = $inserirPaciente->execute();   
    if ( ! $resultadoPaciente ){
        $resultado = false;
        var_dump( $inserirPaciente->errorInfo() );
        exit;
    }
}else{
    $resultado = false;
    var_dump( $inserirEndereco->errorInfo() );
    exit;
}

if ( $resultado ){
   echo "<script language= 'javascript' type='text/javascript'>alert('Cadastro de Paciente realizado com sucesso!');window.location.href='consultaPaciente.php';</script>"; 
}
 

?>