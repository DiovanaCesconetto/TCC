<?php
require_once('conexao.php');
require_once('menu.html');

$id_cidade = (isset($_GET['id_cidade'])) ? $_GET['id_cidade'] : '';

if (!empty($id_cidade) && is_numeric($id_cidade)):
 
	$sql = "SELECT b.id_cidade, b.nome, b.id_cidade FROM cidade AS b LEFT JOIN cidade AS c ON b.id_cidade = c.id_cidade WHERE id_cidade = '$id_cidade' ";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$cidade = $stm->fetch(PDO::FETCH_OBJ);
 
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
			<legend><h6>Formulário - Edição de Cidade</h6></legend>
			
			<?php if(empty($cidade)):?>
				<h3 class="text-center text-danger">cidade não encontrado!</h3>
			<?php else: ?>
				<form action="salvaEdicaoCidade.php" method="post" id='form-contato' enctype='multipart/form-data'>
				
 
		
            <div class="form-group">
          <div class="col-8">
            <label>Nome da cidade</label>
            <input type="text" class="form-control" id="nome"  name="nome" value="<?=$cidade->nome?>" >
          </div>
          
        <div class="form-group">
          <div class="col-8">

            <div class="form-group col-md-4">
                <label for="inputCidade">Cidade</label>
                <select class="form-control" id="id_cidade" name="id_cidade">
          <?php 
              $sql = "SELECT
                        Id_cidade as id_cidade
                          ,nome as nome
                      from  cidade 
                      order by Nome;";
              $consulta = $conn->prepare( $sql );          
              $consulta->execute();
              $cidade = $consulta->fetchAll();

              foreach ($cidade as $key => $value) {
                echo "<option value='".$value['id_cidade']."'>". $value['nome']."</option>";
              }
          ?>
				    <input type="hidden" name="id_cidade" value="<?=$cidade->id_cidade?>">
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='consultaCidade.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>
 
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
