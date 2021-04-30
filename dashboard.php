<?php
require 'verificacao.php';

if(isset($_SESSION['idMed']) && !empty($_SESSION['idMed'])):
    $sql = "SELECT * FROM laudos WHERE medico = '$idDoMedico'";
    $sql = $pdo->query($sql);
    $totalLaudos = $sql->rowCount();

    $sql = "SELECT * FROM pacientes WHERE cadastrante = '$idDoMedico'";
    $sql = $pdo->query($sql);
    $totalPacientes = $sql->rowCount();
?>
<html>
<head>
<title>Dashboard - Lab</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="css/sidebars.css" rel="stylesheet" ">
<link href="css/main.css" rel="stylesheet" ">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Antonio&display=swap" rel="stylesheet">
</head>
  <body>
  <nav class="navbar navbar-light bg-light bg-primary shadow">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="images/icons/iconmedico.png" alt="" width="40" height="40">
      <strong>Laboratório Silva</strong> - Dashboard
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
      <a href="dashboard.php" id="list-group-item" class="list-group-item active">Inicio</a>
      <a href="laudos.php" id="list-group-item" class="list-group-item">Laudos</a>
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
<div class="container">
  <div class="card">
    <div class="circle">
      <h3>Olá</h3>
      </div>
      <div class="content">
        <h5>Seja bem-vindo <strong><?php echo $nomedoMedico ?></strong>, não se esqueça dos protocolos de segurança</h5>
      </div>
  </div>
</div>
<div class="container2">
  <div class="card2">
    <div class="circle2">
      <h3>Opa</h3>
      </div>
      <div class="content2">
        <h5>Você tem um total de <strong><?php echo $totalLaudos ?></strong> laudos gerados e <strong><?php echo $totalPacientes ?></strong> pacientes cadastrados, sempre esteja atento aos seus pacientes</h5>
      </div>
  </div>
</div>

      
  </body>
</html>
<?php else: header ("Location: index.php"); endif; ?>
