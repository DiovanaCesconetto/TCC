<?php
require_once('conexao.php');
require_once('menu.html');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Cadastrar Paciente</title>
  </head>
  <body>
    <!DOCTYPE html>
<html lang="pt-br">
    
</body>
</html>
      
        
      </div>
    </nav>
    <h3><center>Cadastrar Paciente</center></h3></br>
    <form action="salvarPaciente.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome do paciente</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>
          <div class="form-group">
            <label for="CPF">CPF do paciente</label>
            <input type="text" class="form-control" id="CPF" name="CPF">
          </div>
          <div class="form-group">
            <label for="RG">RG do paciente</label>
            <input type="text" class="form-control" id="RG"  name="RG">
          </div>
          
          <div class="form-group">
            <label for="rua">Rua do paciente</label>
            <input type="text" class="form-control" id="rua"  name="rua">
          </div>
          <div class="form-group">
            <label for="numero">Numero do paciente</label>
            <input type="text" class="form-control" id="numero"  name="numero">
          </div>
          <div class="form-group">
            <label for="CEP">CEP do paciente</label>
            <input type="text" class="form-control" id="CEP"  name="CEP">
          </div>
         
          <div class="form-group">
            <label for="bairro">Bairro do paciente</label>
            <input type="text" class="form-control" id="bairro"  name="bairro">
          </div>
          <div class="form-group">
            <label for="cidade">Cidade do paciente</label>
            <input type="text" class="form-control" id="cidade"  name="cidade">

          <div class="form-group">
            <label for="estado">Estado do paciente</label>
            <input type="text" class="form-control" id="estado"  name="estado">
          </div>
        <div class="form-group">
          <label for="email">Insira o email do paciente</label>
          <input type="text" class="form-control" id="email" placeholder="nome@exemplo.com"  name="email">
        </div>
        <div class="form-group">
            <label for="data_nasc">Data de nascimento</label>
            <input type="date" class="form-control" id="data_nasc"  name="data_nasc">
          </div>
          <button class="btn btn-primary" type="submit">Cadastrar</button>

        </form>
        </body>
        </html>