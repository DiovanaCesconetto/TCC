<?php
require_once('menu.html');
?>
        
   <h3><center>Cadastrar Cidade</center></h3></br>

  <form action="salvarCidade.php" method="POST" >
    <div class="form-row">
      <div class="form-group col-md-9">  
        <label>Nome</label>
        <input type="text" class="form-control" id="nome"  name="nome" >
      </div>
      <div class="form-group col-md-3">
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
       <button class="btn btn-primary" type="submit">Cadastrar</button>  
    </form>
 