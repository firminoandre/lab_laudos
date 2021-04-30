<?php

include 'conexaoBD.php';

$clinica = addslashes($_POST['clinica']);
$medico = addslashes($_POST['medico']);  
$paciente = addslashes($_POST['paciente']);
$dataa = (addslashes($_POST['dataa']));
$idade = (addslashes($_POST['idade']));
$peso = (addslashes($_POST['peso']));
$pressao = (addslashes($_POST['pressao']));
$altura = (addslashes($_POST['altura']));
$resultado = (addslashes($_POST['resultado']));

$pdo->query("INSERT INTO laudos SET clinica='$clinica', medico='$medico', paciente='$paciente', dataa='$dataa', 
idade='$idade', peso='$peso', pressao='$pressao', 
altura='$altura', resultado='$resultado'");

header("Location: laudos.php");

?>