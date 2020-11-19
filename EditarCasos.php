<?php
require_once('conexao.php');
require_once('menu.html');

$id_registro = (isset($_GET['id_registro'])) ? $_GET['id_registro'] : '';

if (!empty($id_registro) && is_numeric($id_registro)):
 
	$sql = "SELECT id_registro, observacoes FROM registro_caso WHERE id_registro = '$id_registro' ";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$casos = $stm->fetch(PDO::FETCH_OBJ);

endif;
 


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de Casos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h6>Formulário - Edição de Casos</h6></legend>
			
			<?php if(empty($casos)):?>
				<h3 class="text-center text-danger">Casos não encontrados!</h3>
			<?php else: ?>
				<form action="salvaEdicaoCasos.php" method="post" id='form-contato' enctype='multipart/form-data'>
				
 
		
            <div class="form-group">
          <div class="col-8">
            <label>Nome do caso</label>
            <input type="text" class="form-control" id="nome"  name="nome" value="<?=$id_registro->nome?>" >
          </div>

          <div class="form-group">
          <div class="col-8">
            <label>Nome do Paciente</label>
            <input type="text" class="form-control" id="nome"  name="nome" value="<?=$id_registro->nome?>" >
          </div>

          <div class="form-group">
          <div class="col-8">
            <label>Nome do funcionario</label>
            <input type="text" class="form-control" id="nome"  name="nome" value="<?=$id_registro->nome?>" >
          </div>
          
          <div class="form-group">
          <div class="col-8">
            <label>data do caso</label>
            <input type="text" class="form-control" id="nome"  name="nome" value="<?=$id_registro->nome?>" >
          </div>

          <div class="form-group">
          <div class="col-8">
            <label> Observacoes</label>
            <input type="text" class="form-control" id="nome"  name="nome" value="<?=$id_registro->nome?>" >
          </div>
          
       
				    <a href='consultaCasos.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>
 
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
