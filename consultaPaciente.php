<?php

include('conexao.php');
require_once('menu.html');



	$sql = "SELECT p.id_paciente, p.nome AS nome_paciente, p.data_nasc, p.email, e.numero,
	e.rua, e.cep, b.nome AS nome_bairro, c.nome AS nome_cidade, c.estado 
	FROM paciente AS p
	INNER JOIN endereco AS e ON p.id_endereco = e.id_endereco
	INNER JOIN bairro AS b ON e.id_bairro = b.id_bairro
	INNER JOIN cidade AS c ON c.id_cidade = b.id_cidade";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$paciente = $stm->fetchAll(PDO::FETCH_OBJ);

?>
	<div class='container'>
		<fieldset>

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
							<td><?=date('d/m/Y', strtotime($paciente->data_nasc))?></td>
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
