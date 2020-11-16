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
<<<<<<< HEAD

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
              $consulta = $conn->prepare( $sql );          
              $consulta->execute();
              $cidade = $consulta->fetchAll();
            
              foreach ($cidade as $key => $value) {
                echo "<option value='".$value['id_cidade']."'>". $value['nome']."</option>";
              }
          ?>
        </select>


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

=======
          <div class="form-group">
            <label for="cidade">Cidade do paciente</label>
            <input type="text" class="form-control" id="cidade"  name="cidade">

          <div class="form-group">
            <label for="estado">Estado do paciente</label>
            <input type="text" class="form-control" id="estado"  name="estado">
          </div>
>>>>>>> 4c13dd1001971a7b5bfcb2bdfc20e096a9bf810c
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