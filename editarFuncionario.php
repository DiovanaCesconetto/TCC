<?php
require_once('conexao.php');
require_once('menu.html');

$email = $_SESSION['email'];

$verificaAdmin = $conn->query("select usuario_admin from funcionario WHERE usuario_admin = 1 and email = '$email'");
if( $verificaAdmin->rowCount() == 0 ){
    echo "<script language= 'javascript' type='text/javascript'>alert('Somente funcionário administrador pode realizar a edição!');window.location.href='Painel.php';</script>"; 
}
  


$id_funcionario = (isset($_GET['id_funcionario'])) ? $_GET['id_funcionario'] : '';

if (!empty($id_funcionario) && is_numeric($id_funcionario)):
 
	$sql = "SELECT f.id_funcionario, f.nome AS nome_funcionario, f.email, f.usuario_admin
  FROM funcionario AS f";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$funcionario = $stm->fetch(PDO::FETCH_OBJ);
 
endif;
 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	  <title>Edição de Cliente</title>
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h6>Formulário - Edição de funcionario</h6></legend>
			
			<?php if(empty($funcionario)):?>
				<h3 class="text-center text-danger">funcionario não encontrado!</h3>
			<?php else: ?>
				<form action="salvarEdicaofuncionario.php" method="post" id='form-contato' enctype='multipart/form-data'>
				
          <div class="form-row">
    	      <div class="form-group col-md-6">
        	    <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome"  name="nome" value="<?=$funcionario->nome_funcionario?>" >
            </div>

            <div class="form-group col-md-6">
              <label for="email">E-mail</label>
              <input type="text" class="form-control" id="email" name="email" value="<?=$funcionario->email?>">
            </div>

            <div class="form-group col-md-4">
              <label for="senha">Senha</label>
              <input type = "password" class="form-control"  id = "senha" name = "senha"  >	
            </div>

            <div class="form-group col-md-4">
              <label> Usuário Administrador: </label>
              <input type="checkbox" name="usuario_admin" id="usuario_admin"> <br/> 
            </div>
          </div>
   

				    <input type="hidden" name="id_funcionario" value="<?=$funcionario->id_funcionario?>">
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='consultafuncionario.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>
 
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
