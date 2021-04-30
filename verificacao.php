<?php
require 'conexaoBD.php';

if(isset($_SESSION['idMed']) && !empty($_SESSION['idMed'])){

    require_once 'medico.class.php';
    $u = new Medico();

    // pegando id do medico logado
    $userLogado = $u->logado($_SESSION['idMed']);
    $idDoMedico = $userLogado['idmedico'];

    // pegando nome do medico logado
    $userLogado = $u->logado2($_SESSION['idMed']);
    $nomedoMedico = $userLogado['nome'];

    $sql = "SELECT * FROM medicos";
    $sql = $pdo->query($sql);
    $total = $sql->rowCount();



}else{
    header("Location: index.php");
}



?>