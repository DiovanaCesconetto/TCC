<?php
session_start();
//require_once('conexao_login.php');
require_once('conexao.php');



if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: inicio.php');
	exit();
}

$sql = "select id_funcionario, email, nome from funcionario where email = '{$_POST['email']}' and senha = md5('{$_POST['senha']}') limit 1";
$stm = $conn->prepare($sql);
$stm->execute();
$login = $stm->fetchAll(PDO::FETCH_OBJ);
if(!empty($login)){
	foreach($login as $login):
		$_SESSION['email'] = $login->email;
		$_SESSION['nome']  = $login->nome;
		$_SESSION['id_funcionario'] = $login->id_funcionario;
	endforeach;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: inicio.php');
	exit();
}