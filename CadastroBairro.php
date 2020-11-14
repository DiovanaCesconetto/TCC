<?php
require_once('conexao.php');
require_once('menu.html');
?>

    
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
              $consulta = $conn->prepare( $sql );          
              $consulta->execute();
              $cidade = $consulta->fetchAll();
            
              foreach ($cidade as $key => $value) {
                echo "<option value='".$value['id_cidade']."'>". $value['nome']."</option>";
              }
          ?>
        </select>

        </div><br><br>
          <button class="btn btn-primary" type="submit" value="Salvar">Cadastrar</button>
          </form>
        </body>
       </html>