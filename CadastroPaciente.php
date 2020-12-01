<?php
require_once('conexao.php');
require_once('menu.html');
?>

  <h3><center>Cadastrar Paciente</center></h3></br>
  
  <form action="salvarPaciente.php" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6 " >
        <label for="nome">Nome</label>
        <input type="text" class="form-control " id="nome" name="nome" >
      </div>
      <div class="form-group col-md-3">
        <label for="CPF">CPF</label>
        <input type="text" class="form-control" id="CPF" name="CPF" >
      </div>
      <div class="form-group col-md-3">
        <label for="RG">RG</label>
        <input type="text" class="form-control" id="RG"  name="RG">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="rua">Rua</label>
        <input type="text" class="form-control" id="rua"  name="rua">
      </div>
      <div class="form-group col-md-2">
        <label for="numero">Número</label>
        <input type="text" class="form-control" id="numero"  name="numero">
      </div>
      <div class="form-group col-md-2">
        <label for="CEP">CEP</label>
        <input type="text" class="form-control" id="CEP"  name="CEP">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">  
        <label for="inputCidade">Cidade</label>
          <select class="form-control" id="id_cidade" name="id_cidade">
            <?php 
              $sql = "SELECT Id_cidade as id_cidade,nome as nome from cidade order by Nome;";
              $consulta = $conn->prepare( $sql );          
              $consulta->execute();
              $cidade = $consulta->fetchAll();
            
              foreach ($cidade as $key => $value) {
                echo "<option value='".$value['id_cidade']."'>". $value['nome']."</option>";
              }
           ?>
        </select>
      </div>
      <div class="form-group col-md-4"> 
        <label for="bairro">Bairro</label>
        <select class="form-control" id="bairro" name="bairro">
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
        <label for="inputCidade">Estado</label>
        <select id="estado" name="estado" class="form-control">
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
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" id="email" placeholder="nome@exemplo.com"  name="email">
      </div>
      <div class="form-group col-md-4">
        <label for="data_nasc">Data de nascimento</label>
        <input type="date" class="form-control" id="data_nasc"  name="data_nasc">
      </div>
    </div>

      <button class="btn btn-primary" type="submit">Cadastrar</button>

    </form>
  