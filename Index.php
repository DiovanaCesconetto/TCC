
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <title>Sistema de informações sobre Dengue</title>
  </head>
  <body>

  <div class="btn-group" >
      <button type="button" class="btn btn-light" aria-haspopup="true" aria-expanded="false">
        <a href="inicio.php">Login</a>
     </button>
    </div>

<?php

include('conexao.php');

$sql = "SELECT c.data , b.nome AS nome_bairro, cid.nome AS nome_cidade, cid.estado, COUNT(c.id_registro) AS quantidade_caso
FROM registro_caso AS c 
INNER JOIN paciente AS p ON c.id_paciente = p.id_paciente
INNER JOIN bairro AS b ON p.id_endereco = b.id_bairro
INNER JOIN cidade AS cid ON b.id_cidade = cid.id_cidade
GROUP BY c.data, b.nome, cid.nome, cid.estado ";
$stm = $conn->prepare($sql);
$stm->execute();
$Casos = $stm->fetchAll(PDO::FETCH_OBJ);

?>
	<div class='container'>
		<fieldset>


			<div class='clearfix'></div>

			<?php if(!empty($Casos)):?>
				<th><center><h6>Resumo de casos</h6></th><br>
				<table class="table table-striped">
			
					<tr class='active'>
                        <th>Quantidade de Casos</th>
						<th>Data</th>
						<th>Nome do Bairro</th>
						<th>Cidade</th>
						<th>Estado</th>
					</tr>
					<?php foreach($Casos as $caso):?>
						<tr>
                            <td><?=$caso->quantidade_caso?></td>
							<td><?=$caso->data?></td>
							<td><?=$caso->nome_bairro?></td>
							<td><?=$caso->nome_cidade?></td>
                            <td><?=$caso->estado?></td>                           
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<h3 class="text-center text-primary">Não existem Casos Registrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>

            </body>
            </html>