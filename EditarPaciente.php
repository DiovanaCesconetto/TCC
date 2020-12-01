<?php
require_once('conexao.php');
require_once('menu.html');



$id_paciente = (isset($_GET['id_paciente'])) ? $_GET['id_paciente'] : '';

if (!empty($id_paciente) && is_numeric($id_paciente)):
 

  $sql = "SELECT p.id_paciente, p.nome AS nome_paciente, p.cpf, p.rg, p.data_nasc, p.email, e.numero,
  e.rua, e.cep, b.nome AS nome_bairro, c.nome AS nome_cidade, c.estado, p.id_endereco
  FROM paciente AS p
  INNER JOIN endereco AS e ON p.id_endereco = e.id_endereco
  INNER JOIN bairro AS b ON e.id_bairro = b.id_bairro
  INNER JOIN cidade AS c ON c.id_cidade = b.id_cidade 
  WHERE id_paciente = '$id_paciente' " ;
	$stm = $conn->prepare($sql);
	$stm->execute();
	$paciente = $stm->fetch(PDO::FETCH_OBJ);
 
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
			<legend><h6>Formulário - Edição de funcionario</h6></legend>

      <?php if(empty($paciente)):?>
				<h3 class="text-center text-danger">funcionario não encontrado!</h3>
			<?php else: ?>
  
  <form action="salvarEdicaoPaciente.php" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?=$paciente->nome_paciente?>" >
      </div>
      <div class="form-group col-md-3">
        <label for="CPF">CPF</label>
        <input type="text" class="form-control" id="CPF" name="CPF" value="<?=$paciente->cpf?>" >
      </div>
      <div class="form-group col-md-3">
        <label for="RG">RG</label>
        <input type="text" class="form-control" id="RG"  name="RG" value="<?=$paciente->rg?>" >
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="rua">Rua</label>
        <input type="text" class="form-control" id="rua"  name="rua" value="<?=$paciente->rua?>">
      </div>
      <div class="form-group col-md-2">
        <label for="numero">Número</label>
        <input type="text" class="form-control" id="numero"  name="numero" value="<?=$paciente->numero?>" >
      </div>
      <div class="form-group col-md-2">
        <label for="CEP">CEP</label>
        <input type="text" class="form-control" id="CEP"  name="CEP" value="<?=$paciente->cep?>">
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4"> 
        <label for="bairro">Bairro</label>
        <select class="form-control" id="bairro" name="bairro" value="<?=$paciente->nome_bairro?>">
          <?php 
            $sql = "SELECT id_bairro, nome, id_cidade FROM bairro ORDER BY nome;";
            $consulta = $conn->prepare( $sql );          
            $consulta->execute();
            $bairro = $consulta->fetchAll();            
              foreach ($bairro as $key => $value) {
                echo "<option value='".$value['id_bairro']."'>". $value['nome']."</option>";
              }
          ?>
        </select>
      </div>
    
      <div class="form-group col-md-4">  
        <label for="inputCidade">Cidade</label>
        <input type="text" class="form-control" id="id_cidade" name="id_cidade" value="<?=$paciente->nome_cidade?>" readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="inputCidade">Estado</label>
        <input type="text" id="estado" name="estado" class="form-control" value="<?=$paciente->estado?>" readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" id="email" placeholder="nome@exemplo.com"  name="email" value="<?=$paciente->email?>">
      </div>
      <div class="form-group col-md-4">
        <label for="data_nasc">Data de nascimento</label>
        <input type="date" class="form-control" id="data_nasc"  name="data_nasc" value="<?=$paciente->data_nasc?>">
      </div>
    </div>

          <input type="hidden" name="id_paciente" value="<?=$paciente->id_paciente?>">
          <input type="hidden" name="id_endereco" value="<?=$paciente->id_endereco?>">

				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='consultapaciente.php' class="btn btn-danger">Cancelar</a>
          
      </form>
			<?php endif; ?>
		</fieldset>
 
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
