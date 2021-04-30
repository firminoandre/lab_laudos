<?php
require 'verificacao.php';
if(isset($_SESSION['idMed']) && !empty($_SESSION['idMed'])):
?>
<html>
<head>
<title>Cadastro de Pacientes - Lab</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="css/main.css" rel="stylesheet">
<link href="css/sidebars.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
  <body>
  <nav class="navbar navbar-light bg-light bg-primary shadow">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="images/icons/iconmedico.png" alt="" width="40" height="40">
      <strong>Laboratório Silva</strong> - Cadastro
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
      <a href="laudos.php" id="list-group-item" class="list-group-item">Laudos</a>
      <a href="cdpacientes.php" id="list-group-item" class="list-group-item active">Cadastrar Paciente</a>
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
<h4 class="titulo">Cadastro de Pacientes</h4>
<div class="alerta">
<div class="alert alert-danger" role="alert">
  <strong><?php echo $nomedoMedico ?></strong>, não esqueca que o login do paciente será seu CPF, atenção!
</div>
</div>
<form action="cadastro_paciente.php" method="POST" class="row g-3 cadastro">
  <div class="col-md-6">
    <label for="inputNome" class="form-label">Nome completo</label>
    <input name="nome" type="text" class="form-control" id="nome" required>
  </div>
  <div class="col-md-3">
    <label for="inputIdade" class="form-label">Idade</label>
    <input name="idade" type="text" class="form-control" id="idade" required>
  </div>
  <div class="col-md-3">
    <label for="inputCpf" class="form-label">CPF</label>
    <input name="cpf" type="text" class="form-control" id="cpf" placeholder="000.000.000-12" required>
  </div>
  <div class="col-12">
    <label for="inputMae" class="form-label">Nome da Mãe</label>
    <input name="nomemae" type="text" class="form-control" id="nomemae" required>
  </div>
  <div class="col-md-6">
    <label for="inputCidadeNasc" class="form-label">Cidade de Nascimento</label>
    <input name="cidadenasc" type="text" class="form-control" id="cidadenasc" required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Estado de Nascimento</label>
    <select name="estadonasc" id="estadonasc" class="form-select">
      <option>Maranhão</option>
      <option>Pará</option>
      <option>Ceará</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Cidade Atual</label>
    <input name="cidadeatual" type="text" class="form-control" id="cidadeatual" required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Estado Atual</label>
    <select name="estadoatual" id="estadoatual" class="form-select">
      <option >Maranhão</option>
      <option >Pará</option>
      <option >Ceará</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Nacionalidade</label>
    <input name="nacionalidade" type="text" class="form-control" id="nacionalidade" required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Médico(a) Cadastrante</label>
    <select name="cadastrante" id="cadastrante" class="form-select">
      <option value="1">Firmino</option>
      <option value="2">Pedro</option>
      <option value="3">Marcia</option>
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>

</form>
      <br>
      <br>
  </body>
</html>
<?php else: header ("Location: index.php"); endif; ?>