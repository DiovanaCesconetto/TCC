<?php

include('conexao.php');
require_once('menu.html');
	
	$sql = "SELECT c.id_registro, c.id_funcionario, f.nome AS nome_funcionario,
	 c.id_paciente, p.nome AS nome_paciente, p.data_nasc, c.data AS data_caso, 
	 c.observacoes FROM registro_caso AS c 
	INNER JOIN paciente AS p ON c.id_paciente = p.id_paciente
	INNER JOIN funcionario AS f ON c.id_funcionario = f.id_funcionario";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$Casos = $stm->fetchAll(PDO::FETCH_OBJ);

?>
	<div class='container'>
		<fieldset>
<?php

?>
			<div class='clearfix'></div>

			<?php if(!empty($Casos)):?>
				<th><center><h6>Listagem de casos(s)</h6></th><br>
				<table class="table table-striped">
			
					<tr class='active'>

						<th>ID</th>
						<th>Nome do paciente</th>
						<th>Nome do funcionario</th>
						<th>data do caso</th>
						<th>observacoes</th>
						<th>Operação</th>
					</tr>
					<?php foreach($Casos as $casos):?>
						<tr>
							<td><?=$casos->id_registro?></td>
							<td><?=$casos->nome_paciente?></td>
							<td><?=$casos->nome_funcionario?></td>
							<td><?=$casos->data_caso?></td>
							<td><?=$casos->observacoes?></td>

							<td>
								<a href='EditarCasos.php?id_registro=<?=$casos->id_registro?>' class="btn btn-primary">Editar</a>
								<a href='ExcluirCasos.php?id_registro=<?=$casos->id_registro?>' class="btn btn-danger">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<h3 class="text-center text-primary">Não existem Casos cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>


