<?php
require_once('conexao.php');
require_once('menu.html');

$id_registro = (isset($_GET['id_registro'])) ? $_GET['id_registro'] : '';

if (!empty($id_registro) && is_numeric($id_registro)):
 
	$sql = "SELECT r.id_registro, p.nome, r.data, r.observacoes
  FROM registro_caso AS r
  INNER JOIN paciente AS p ON r.id_paciente = p.id_paciente
   WHERE id_registro = '$id_registro' ";
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
				<form action="salvarEdicaoCasos.php" method="post" id='form-contato' enctype='multipart/form-data'>
				
        <div class="form-row">
        <div class="form-group col-md-8">
            <label>Nome</label>
            <input type="text" class="form-control" id="nome"  name="nome" value="<?=$casos->nome?>" >
          </div>

          <div class="form-group col-md-4">
            <label>data do caso</label>
            <input type="date" class="form-control" id="data"  name="data" value="<?=$casos->data?>" >
          </div>

          <div class="form-group col-md-12">
            <label> Observacoes</label>
            <textarea type="text" class="form-control" id="observacoes"  name="observacoes"> <?=$casos->observacoes?></textarea>
          </div>
          
       </div>
       <input type="hidden" name="id_registro" value="<?=$casos->id_registro?>">
				 
       <button type="submit" class="btn btn-primary" id='botao'> 
				  Gravar
			 </button>

				</form>
			<?php endif; ?>
		</fieldset>
 
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
