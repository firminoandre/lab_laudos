<?php
require 'verificacao.php';

if(isset($_SESSION['idMed']) && !empty($_SESSION['idMed'])):
   //SQL para selecionar os registros
   $stmt = $pdo->prepare("SELECT * FROM medicos WHERE idmedico = $idDoMedico");
   $stmt->execute();

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
      <a href="laudos.php" id="list-group-item" class="list-group-item ">Laudos</a>
      <a href="cdpacientes.php" id="list-group-item" class="list-group-item">Cadastrar Paciente</a>
      <a href="editarPerfil.php" id="list-group-item" class="list-group-item active">Meu Perfil</a>
      <a href="sair.php" id="list-group-item" class="list-group-item">Sair</a>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
        
      </div>
    </div>
  </div>
</div>
<h4 class="titulo">Meu perfil</h4>
<div class="alerta">
<div class="alert alert-primary" role="alert">
  <strong><?php echo $nomedoMedico ?></strong>, aqui você poderá editar as informações da sua conta!
</div>
</div>
<form action="editar_perfil.php" method="POST" class="row g-3 cadastro">
  <div class="col-md-6">
    <label for="inputNome" class="form-label">Nome completo</label>
    <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome completo"
    <?php 
      $stmt = $pdo->prepare("SELECT * FROM medicos WHERE idmedico = $idDoMedico");
      $stmt->execute();
    if($stmt->rowCount() > 0){
        while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo "<input value='{$dados['nome']}'></input> ";
        }
      }
    ?>
  </div>
  <div class="col-md-3">
    <label for="inputIdade" class="form-label">CPF</label>
    <input name="cpf" type="text" class="form-control" id="000.000.000.12" placeholder="000.000.000.12"
    <?php 
      $stmt = $pdo->prepare("SELECT * FROM medicos WHERE idmedico = $idDoMedico");
      $stmt->execute();
    if($stmt->rowCount() > 0){
        while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo "<input value='{$dados['cpf']}'></input> ";
        }
      }
    ?>
  </div>
  <div class="col-md-3">
    <label for="inputCpf" class="form-label">E-mail</label>
    <input name="email" type="text" class="form-control" id="cpf" placeholder="medico@medico.com" 
    <?php 
      $stmt = $pdo->prepare("SELECT * FROM medicos WHERE idmedico = $idDoMedico");
      $stmt->execute();
    if($stmt->rowCount() > 0){
        while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo "<input value='{$dados['email']}'></input> ";
        }
      }
    ?>
  </div>
  <div class="col-md-3">
    <label for="inputCpf" class="form-label">Especialidade</label>
    <input name="especialidade" type="text" class="form-control" id="cpf" placeholder="Ex: Pediatria"
    <?php 
      $stmt = $pdo->prepare("SELECT * FROM medicos WHERE idmedico = $idDoMedico");
      $stmt->execute();
    if($stmt->rowCount() > 0){
        while($dados = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo "<input value='{$dados['especialidade']}'></input> ";
        }
      }
    ?>
  </div>
  <div class="btnAtt">
    <button type="submit" class="btn btn-success">Atualizar</button>
  </div>

</form>
      <br>
      <br>
  </body>
</html>

<?php else: header ("Location: index.php"); endif; ?>