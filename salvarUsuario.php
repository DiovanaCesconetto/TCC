<?php
include ('conexao.php');

$usuario = $_POST['usuario'];
$senha = MD5($_POST['senha']);
if( !empty($_POST['usuario_admin']) ){
  $usuarioAdmin = 1;
}else{
  $usuarioAdmin = 0;
}

if( empty($_POST['usuario']) || empty($_POST['senha'])){
  echo "<script language= 'javascript' type='text/javascript'>alert('É necessário informar usuário e senha');window.location.href='CadastroUsuario.php';</script>";
}else{
  $verificaUsuario = $conn->query("select usuario from usuario WHERE usuario = '$usuario'");
  if($verificaUsuario->rowCount() > 0){
    echo "<script language= 'javascript' type='text/javascript'>alert('Usuário já cadastrado anteriomente!');window.location.href='CadastroUsuario.php';</script>"; 
  }else{
    $query = "insert into usuario (usuario,senha, usuario_admin )  VALUES ('$usuario', '$senha', '$usuarioAdmin')";
      
    $inserir = $conn->prepare( $query );
    $inserir->bindParam( ':usuario', $nome);
    $inserir->bindParam( ':senha', $senha);
    $inserir->bindParam( ':usuario_admin', $usuarioAdmin);

    $resultado = $inserir->execute();
    if ( ! $resultado ){
      var_dump( $inserir->errorInfo() );
      exit;
    }else{
      echo "<script language= 'javascript' type='text/javascript'>alert('Cadastro de usuário realizado com sucesso!');window.location.href='painel.php';</script>"; 
    }
  }
}

?>