<?php

include 'conexaoBD.php';
require 'verificacao.php';

$nome = addslashes($_POST['nome']);
$cpf = addslashes($_POST['cpf']);  
$email = addslashes($_POST['email']);
$especialidade = (addslashes($_POST['especialidade']));


$pdo->query("UPDATE medicos SET nome='$nome', cpf='$cpf', email='$email', especialidade='$especialidade' WHERE idmedico = $idDoMedico");

header("Location: editarPerfil.php");

?>