<?php

include('conexao.php');
require_once('menu.html');

// Recebe o termo de pesquisa 
/*$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

if (empty($termo)):*/

	$sql = "SELECT b.id_bairro, b.nome as nome_bairro, c.nome as nome_cidade, c.estado
	FROM bairro AS b
	LEFT JOIN cidade AS c ON b.id_cidade = c.id_cidade ";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$Bairros = $stm->fetchAll(PDO::FETCH_OBJ);
/*
else:

	$sql = "SELECT b.id_bairro, b.nome as nome_bairro, c.nome as nome_cidade, c.estado
	FROM bairro AS b
	LEFT JOIN cidade AS c ON b.id_cidade = c.id_cidade 
	WHERE b.nome LIKE '%$termo%'";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$Bairros = $stm->fetchAll(PDO::FETCH_OBJ);

endif;*/
?>
	<div class='container'>
		<fieldset>
<?php
/*
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-06">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-6'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome do Bairro">
				</div>
		
				<button type="submit" class="btn btn-primary">Pesquisar</button>
				<a href='consultaBairro.php' class="btn btn-primary">Ver Todos</a>
			
			</form>
*/
?>
			<div class='clearfix'></div>

			<?php if(!empty($Bairros)):?>
				<th><center><h6>Listagem de Bairro(s)</h6></th><br>
				<table class="table table-striped">
			
					<tr class='active'>
						<th>ID</th>
						<th>Nome do Bairro</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Operação</th>
					</tr>
					<?php foreach($Bairros as $bairro):?>
						<tr>
							<td><?=$bairro->id_bairro?></td>
							<td><?=$bairro->nome_bairro?></td>
							<td><?=$bairro->nome_cidade?></td>
							<td><?=$bairro->estado?></td>
							<td>
								<a href='EditarBairro.php?id_bairro=<?=$bairro->id_bairro?>' class="btn btn-primary">Editar</a>
								<a href='ExcluirCasos.php?id_bairro=<?=$bairro->id_bairro?>' class="btn btn-danger">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<h3 class="text-center text-primary">Não existem Bairros cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
