<?php
require_once('conexao.php');
require_once('menu.html');
?>
   
        
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
          <!-- <option>ll</option>
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