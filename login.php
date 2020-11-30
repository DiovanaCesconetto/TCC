<?php
echo "daf7d87as8d7fase54";
session_start();
require_once('conexao_login.php');

echo "adadsads";

if(empty($_POST['email']) || empty($_POST['senha'])) {
	echo "545afd4as45d";
	header('Location: inicio.php');
	exit();
}

echo "adadfavqerqwv";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);




$query = "select email from funcionario where email = '{$email}' and senha = md5('{$senha}')";

echo "query".$query;

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	echo "kkjjk";
	$_SESSION['email'] = $email;
	header('Location: painel.php');
	exit();
} else {
	echo "adasdasda5dfa58";
	$_SESSION['nao_autenticado'] = true;
	header('Location: inicio.php');
	exit();
}