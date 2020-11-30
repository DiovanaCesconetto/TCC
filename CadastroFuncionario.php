<?php
require_once('conexao.php');
require_once('menu.html');
?>
<section>

<h3><center>Cadastrar Funcionário</center></h3></br>
  
<form action="salvarFuncionario.php" method="POST">

  <div class="form-row">
    	<div class="form-group col-md-6">
        	<label for="nome">Nome</label>
        	<input type="text" class="form-control" id="nome" name="nome"  >
      	</div>

	  	<div class="form-group col-md-6">
        	<label for="email">E-mail</label>
        	<input type="text" class="form-control" id="email" name="email" >
      	</div>

	  	<div class="form-group col-md-4">
	  		<label for="senha">Senha</label>
			<input type = "password" class="form-control"  id = "senha" name = "senha"  >	
	  	</div>

		<div class="form-group col-md-4">
			<label> Usuário Administrador: </label>
			<input type="checkbox" name="usuario_admin" id="usuario_admin"> <br/> 
	 	</div>
	</div>
 	<button class="btn btn-primary" type="submit">Cadastrar</button>  
</form>