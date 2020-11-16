<?php
require_once('conexao.php');
require_once('menu.html');

$id_cidade = (isset($_GET['id_cidade'])) ? $_GET['id_cidade'] : '';

if (!empty($id_cidade) && is_numeric($id_cidade)):
 
	$sql = "SELECT id_cidade, nome, estado FROM cidade WHERE id_cidade = '$id_cidade' ";
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
              <label for="inputCidade">Estado</label>
              <select id="estado" name="estado">
                <option value="">Selecione</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espirito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MT">Mato Grosso</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
</select>
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
