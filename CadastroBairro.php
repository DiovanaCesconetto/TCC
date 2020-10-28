<?php
require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastrar Bairro</title>
  </head>
  <body>
    <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Pagina inicial</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Inicio.html">Inicio</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="  ">Login</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
              <span class="navbar-toggler-icon"></span>
              
      </button>
      <a class="navbar-brand" href="CadastroBairro.php">Bairro</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="CadastroCasos.php">Casos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <a class="navbar-brand" href="cadastroPaciente.php">Paciente</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="CadastroCidade.php">Cidade</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="CadastroFuncionario.php">Funcionario</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      
       
  </div>
</nav>

    
</body>
</html>
      </div>
    </nav>
    <h3><center>Cadastrar Bairro</center></h3></br>
    <form action="salvarBairro.php" method="POST" >
        <div class="form-group">
          <div class="col-8">
            <label>Nome do bairro</label>
            <input type="text" class="form-control" id="nome"  name="nome" >
          </div>
          
        <div class="form-group">
          <div class="col-8">

            <div class="form-group col-md-4">
                <label for="inputCidade">Cidade</label>
                <select class="form-control" id="id_cidade" name="id_cidade">
          <?php 
              $sql = "SELECT
                        Id_cidade as id_cidade
                          ,nome as nome
                      from  cidade 
                      order by Nome;";
              //Preparando o sql para ser executado
              $consulta = $conn->prepare( $sql ); 
              //Aqui ele esta executando o sql            
              $consulta->execute();
              //Aqui ele esta coletando os dados com o metodo fetchAll, quue pega todos os registros do banco
              $cidade = $consulta->fetchAll();
            
              //Aqui ele vai iterar ou seja percorrer o array/lista 
              //de pacientes retornados do banco de dados;
              foreach ($cidade as $key => $value) {
                echo "<option value='".$value['id_cidade']."'>". $value['nome']."</option>";
              }
          ?>
          <!-- <option>Lucas Giori</option>
          <option>Diviona</option> -->
        </select>

        </div><br><br>
          <button class="btn btn-primary" type="submit" value="Salvar">Cadastrar</button>
          </form>
        </body>
       </html>