<?php

include('conexao.php');
require_once('menu.html');



	$sql = "SELECT b.id_paciente, b.nome AS nome_paciente, b.data_nasc, b.email, c.nome AS nome_bairro, d.nome AS nome_cidade, d.estado 
	FROM paciente AS b
	INNER JOIN bairro AS c ON b.id_endereco = c.id_bairro
	INNER JOIN cidade AS d ON c.id_cidade = d.id_cidade";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$paciente = $stm->fetchAll(PDO::FETCH_OBJ);
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

			<?php if(!empty($paciente)):?>
				<th><center><h6>Listagem de paciente(s)</h6></th><br>
				<table class="table table-striped">
			
					<tr class='active'>
						<th>ID</th>
						<th>Nome do paciente</th>
						<th>nascimento</th>
						<th>email</th>
						<th>nome do bairro </th>
						<th>nome da cidade</th>
						<th>estado</th>
						<th>Operação</th>
					</tr>
					<?php foreach($paciente as $paciente):?>
						<tr>
							<td><?=$paciente->id_paciente?></td>
							<td><?=$paciente->nome_paciente?></td>
							<td><?=$paciente->data_nasc?></td>
							<td><?=$paciente->email?></td>
							<td><?=$paciente->nome_bairro?></td>
							<td><?=$paciente->nome_cidade?></td>
							<td><?=$paciente->estado?></td>

							<td>
								<a href='Editarpaciente.php?id_paciente=<?=$paciente->id_paciente?>' class="btn btn-primary">Editar</a>
								<a href='ExcluirPaciente.php?id_paciente=<?=$paciente->id_paciente?>' class="btn btn-danger">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<h3 class="text-center text-primary">Não existem pacientes cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
