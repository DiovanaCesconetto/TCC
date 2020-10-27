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
              <a class="navbar-brand" href="Login.html">Login</a>
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
    
    <h3><center>Cadastrar Casos</center></h3></br>
    <form action="salvarCasos.php" method="POST">
       
        <div class="form-group">
        <select class="form-control" id="id_paciente" name="id_paciente">
          <?php 
              $sql = "SELECT
                        p.Id_paciente as id_paciente
                          ,p.Nome as nome
                      from  paciente p
                      order by p.Nome;";
              //Preparando o sql para ser executado
              $stmt = $conn->prepare( $sql ); 
              //Aqui ele esta executando o sql            
              $stmt->execute();
              //Aqui ele esta coletando os dados com o metodo fetchAll, quue pega todos os registros do banco
              $pacientes = $stmt->fetchAll();
            
              //Aqui ele vai iterar ou seja percorrer o array/lista 
              //de pacientes retornados do banco de dados;
              foreach ($pacientes as $key => $value) {
                echo "<option value='".$value['id_paciente']."'>". $value['nome']."</option>";
              }
          ?>
          <!-- <option>Lucas Giori</option>
          <option>Diviona</option> -->
        </select>
          </div>
          <div class="form-group">
            <label for="data_caso">Data do caso</label>
            <input type="date" class="form-control" id="data_caso" name="data_caso">
          </div>
          <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control" id="observacoes" name="observacoes" rows="3"></textarea>
          </div>
          <button class="btn btn-primary" type="submit">Cadastrar</button>  
    </form>
        </body>
        </html>