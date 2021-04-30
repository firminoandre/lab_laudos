<?php

include 'conexaoBD.php';

$nome = addslashes($_POST['nome']);
$idade = addslashes($_POST['idade']);
$cpf = (addslashes($_POST['cpf']));
$nomemae = (addslashes($_POST['nomemae']));
$cidadenasc = (addslashes($_POST['cidadenasc']));
$estadonasc = (addslashes($_POST['estadonasc']));
$cidadeatual = (addslashes($_POST['cidadeatual']));
$estadoatual = (addslashes($_POST['estadoatual']));
$nacionalidade = (addslashes($_POST['nacionalidade']));
$cadastrante = (addslashes($_POST['cadastrante']));

$pdo->query("INSERT INTO pacientes SET nome='$nome', idade='$idade', cpf='$cpf', nomemae='$nomemae', 
cidadenasc='$cidadenasc', estadonasc='$estadonasc', cidadeatual='$cidadeatual', 
estadoatual='$estadoatual', nacionalidade='$nacionalidade', cadastrante='$cadastrante', senha='labsilva@labsilva'");

header("Location: cdpacientes.php");

?>