<?php

include('conexao.php');
require_once('menu.html');

// Recebe o termo de pesquisa 
/*$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

if (empty($termo)):*/

	$sql = "SELECT b.id_funcionario, b.nome as nome_funcionario, c.nome as nome_cidade, c.estado
	FROM funcionario AS b
	LEFT JOIN cidade AS c ON b.id_cidade = c.id_cidade ";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$funcionario = $stm->fetchAll(PDO::FETCH_OBJ);
/*
else:

	$sql = "SELECT b.id_funcionario, b.nome as nome_funcionario, c.nome as nome_cidade, c.estado
	FROM funcionario AS b
	LEFT JOIN cidade AS c ON b.id_cidade = c.id_cidade 
	WHERE b.nome LIKE '%$termo%'";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$funcionario = $stm->fetchAll(PDO::FETCH_OBJ);

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
				<a href='consultafuncionario.php' class="btn btn-primary">Ver Todos</a>
			
			</form>
*/
?>
			<div class='clearfix'></div>

			<?php if(!empty($funcionario)):?>
				<th><center><h6>Listagem de funcionario(s)</h6></th><br>
				<table class="table table-striped">
			
					<tr class='active'>
						<th>ID</th>
						<th>Nome do funcionario</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Operação</th>
					</tr>
					<?php foreach($funcionario as $funcionario):?>
						<tr>
							<td><?=$funcionario->id_funcionario?></td>
							<td><?=$funcionario->nome_funcionario?></td>
							<td><?=$funcionario->nome_cidade?></td>
							<td><?=$funcionario->estado?></td>
							<td>
								<a href='Editarfuncionario.php?id_funcionario=<?=$funcionario->id_funcionario?>' class="btn btn-primary">Editar</a>
								<a href='Excluirfuncionario.php?id_funcionario=<?=$funcionario->id_funcionario?>' class="btn btn-danger">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<h3 class="text-center text-primary">Não existem funcionario cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
