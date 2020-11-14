<?php
require_once('conexao.php');
require_once('menu.html');

$usuario = $_SESSION['usuario'];

$verificaAdmin = $conn->query("select usuario_admin from usuario WHERE usuario_admin = 1 and usuario = '$usuario'");
if( $verificaAdmin->rowCount() == 0 ){
    echo "<script language= 'javascript' type='text/javascript'>alert('Somente usuário administrador pode realizar o cadastro!');window.location.href='Painel.php';</script>"; 
}
  
?>

<section>

<div id="FormularioCadastro">
	
<form action="salvarUsuario.php" method="post">
	<fieldset>
	<h2><b>Cadastro de Usuários do sistema</b> </h2>

	<div id="campo">
		<label> Nome</label>
		<div id="entradas">
			<input type = "text" name = "usuario" id = "usuario" placeholder = "Digite o nome de usuário"  >
		</div>
	</div>

	<div id="campo">
		<label>  Senha </label>
		
		<div id="entradas">

			<input type = "password" name = "senha" id = "senha" placeholder = "Digite sua senha" >		
		</div>
	</div>
	<div id="campo">
		<label> Usuário Administrador: </label>
		<input type="checkbox" name="usuario_admin" id="usuario_admin"> <br/> 
	 </div>


	<center>
	<input class = "enviar"type = "submit" value = "Enviar">
	   


<input class = "cancelar" type = "reset" value = "Cancelar">
</center>


</fieldset>
</form>
</div>
</section>



</body>

</html>

