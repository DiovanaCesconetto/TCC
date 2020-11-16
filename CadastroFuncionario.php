<?php
require_once('conexao.php');
require_once('menu.html');
?>
<section>

	<div id="FormularioCadastro">
	
	
	
<form action="salvarFuncionario.php" method="post">

<fieldset>
<h2><b>Cadastre-se</b> </h2>
<hr></hr>

<div id="campo">

	<p></p>
	<label> <b>Nome</b> </label>
	
	<div id="entradas">
		<input type = "text" name = "nome" id = "nome" placeholder = "Digite seu nome"  >
	
	</div>
</div>

<div id="campo">

	<label> <b> E-mail </b> </label>
	
	<div id="entradas">

		<input type = "mail" name = "email" id = "email" placeholder = "Digite seu e-mail" >


	</div>
</div>


<div id="campo">

	<label> <b> Senha </b> </label>
	
	<div id="entradas">

		<input type = "password" name = "senha" id = "senha" placeholder = "Digite sua senha" >

		
	
	</div>
</div>
 

<div id="campo">

	<center>
	<input class = "enviar"type = "submit" value = "Enviar">
	   


<input class = "cancelar" type = "reset" value = "Cancelar">
</center>
</div>

</fieldset>
</form>
</div>
</section>


</footer>

</body>

</html>

