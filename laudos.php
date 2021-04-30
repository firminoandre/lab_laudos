<?php
require 'verificacao.php';

if(isset($_SESSION['idMed']) && !empty($_SESSION['idMed'])):
   //SQL para selecionar os registros
$st = $pdo->query("SELECT * FROM laudos WHERE medico = $idDoMedico");

$results = $st->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id_editar'])){
  $id_editar = addslashes($_GET['id_editar']);
  $res = $u->buscarDadosPaciente($id_editar);
}
?>

<html>
<head>
<title>Dashboard - Lab</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="css/sidebars.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/laudos.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Antonio&display=swap" rel="stylesheet">
</head>
  <body>
  <nav class="navbar navbar-light bg-light bg-primary shadow">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="images/icons/iconmedico.png" alt="" width="40" height="40">
      <strong>Laboratório Silva</strong> - Laudos
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content" id="modal-content2">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ul class="list-group list-group-flush">
      <a href="dashboard.php" id="list-group-item" class="list-group-item">Inicio</a>
      <a href="laudos.php" id="list-group-item" class="list-group-item active">Laudos</a>
      <a href="cdpacientes.php" id="list-group-item" class="list-group-item">Cadastrar Paciente</a>
      <a href="editarPerfil.php" id="list-group-item" class="list-group-item">Meu Perfil</a>
      <a href="sair.php" id="list-group-item" class="list-group-item">Sair</a>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCadastro">Cadastrar Laudo</button>

<!-- Modal -->
<div class="modal fade modalCadastro" id="modalCadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="modalContent">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de LAUDO</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="cadastro_laudo.php" method="POST" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Clínica</label>
    <input type="text" class="form-control" name="clinica" value="<?php if(isset($res)){echo $res['clinica'];} ?>">
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Médico Solicitante</label>
    <select name="medico" class="form-select">
    <option value="1">Firmino</option>
      <option value="2">Pedro</option>
      <option value="3">Marcia</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Paciente</label>
    <select name="paciente" class="form-select">
      <?php
          $stmt = $pdo->prepare("SELECT nome FROM pacientes WHERE cadastrante = $idDoMedico");
          $stmt->execute();

          if($stmt->rowCount() > 0){
            while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
              echo "<option value='{$dados['nome']}'> {$dados['nome']}</option> ";
            }
          }
      ?>
    </select>
  </div>
  <div class="col-3">
    <label for="inputAddress2" class="form-label">Data</label>
    <input type="date" class="form-control" name="dataa">
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">Idade</label>
    <input type="text" class="form-control" name="idade">
  </div>

  <div class="col-md-3">
    <label for="inputZip" class="form-label">Peso</label>
    <input type="text" class="form-control" name="peso">
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Pressão Arterial</label>
    <input type="text" class="form-control" name="pressao">
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Altura</label>
    <input type="text" class="form-control" name="altura">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Resultado do exame</label>
    <textarea class="form-control" name="resultado" rows="3"></textarea>
  </div>
  <div class="col-3">
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
    </div>
</div>
</form>
    </div>
  </div>
</div>

<table class="table table-dark" id="tabelaLaudos">
  <thead>
  <tr>
                                       <th>Id</th>
                                       <th>Clinica</th>
                                       <th>Médico</th>                                
                                       <th>Paciente</th>  
                                       <th>Data</th>
                                       <th>Idade</th>
                                       <th>Peso</th>
                                       <th>Pressão Arterial</th>
                                       <th>Altura</th>
                                       <th>Resultado</th>
                                       <th>Ações</th>
                                       <th></th>
                                   </tr>
  </thead>
  <tbody>
                                   <?php

                                   foreach($results as $dat) {     
                                    if(isset($_GET['id_editar'])){
                                      $id_editar = addslashes($_GET['id_editar']);
                                      $res = $u->buscarDadosPaciente($id_editar);
                                    }                                              
                                   ?>
                                  
                                   <tr>
                                       <td><?php echo $dat['idlaudo'] ?></td>
                                       <td><?php echo $dat['clinica'] ?></td>
                                       <td><?php echo $dat['medico'] ?></td>
                                       <td><?php echo $dat['paciente'] ?></td>    
                                       <td><?php echo $dat['dataa'] ?></td>    
                                       <td><?php echo $dat['idade'] ?></td>    
                                       <td><?php echo $dat['peso'] ?></td>    
                                       <td><?php echo $dat['pressao'] ?></td>    
                                       <td><?php echo $dat['altura'] ?></td>    
                                       <td><?php echo $dat['resultado'] ?></td>    
                                       <td><a class="btn btn-warning" id="editar" href="laudos.php?id_editar=<?php echo $dat['idlaudo'] ?>" data-toggle="modal" data-target="#modalCadastro"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
</svg></a></td>    
                                       <td><button type="button" id="excluir" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
  <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
</svg></button></td>    
                                       
                                   </tr>
                                   <?php
                                       }
                                   ?>                                
                               </tbody>  
</table>
<br>
<br>
  </body>
</html>


<?php else: header ("Location: index.php"); endif; ?>