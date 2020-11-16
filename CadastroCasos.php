<?php
require_once('conexao.php');
require_once('menu.html');
?>
      
   <h3><center>Cadastrar Casos</center></h3></br>
  
   <form action="salvarCasos.php" method="POST">
       
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="nome">Nome</label>
          <select class="form-control" id="id_paciente" name="id_paciente">
            <?php 
              $sql = "SELECT p.Id_paciente as id_paciente, p.Nome as nome FROM paciente p order by p.Nome;";
              $stmt = $conn->prepare( $sql );          
              $stmt->execute();
              $pacientes = $stmt->fetchAll();
              foreach ($pacientes as $key => $value) {
                echo "<option value='".$value['id_paciente']."'>". $value['nome']."</option>";
              }
           ?>
         </select>
      </div>
      <div class="form-group col-md-4">
        <label for="data_caso">Data do caso</label>
        <input type="date" class="form-control" id="data_caso" name="data_caso">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="observacoes">Observações</label>
        <textarea class="form-control" id="observacoes" name="observacoes" rows="3"></textarea>
      </div>
   </div>
          <button class="btn btn-primary" type="submit">Cadastrar</button>  
    </form>
    