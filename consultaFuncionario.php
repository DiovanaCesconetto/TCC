<?php

include('conexao.php');
require_once('menu.html');

	$sql = "SELECT f.id_funcionario, f.nome AS nome_funcionario, f.email, IF (f.usuario_admin = 1, 'Sim', 'Não') AS admin
	FROM funcionario AS f";
	$stm = $conn->prepare($sql);
	$stm->execute();
	$funcionario = $stm->fetchAll(PDO::FETCH_OBJ);

?>
	<div class='container'>
		<fieldset>
<?php

?>
			<div class='clearfix'></div>

			<?php if(!empty($funcionario)):?>
				<th><center><h6>Listagem de funcionario(s)</h6></th><br>
				<table class="table table-striped">
			
					<tr class='active'>
						<th>ID</th>
						<th>Nome do funcionario</th>
						<th>E-mail</th>
						<th>Usuário Admin</th>
						<th>Operação</th>
					</tr>
					<?php foreach($funcionario as $funcionario):?>
						<tr>
							<td><?=$funcionario->id_funcionario?></td>
							<td><?=$funcionario->nome_funcionario?></td>
							<td><?=$funcionario->email?></td>
							<td><?=$funcionario->admin?></td>
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
