<?php 

//se existir cpf      e for diferente de vazio
if(isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require 'conexaoBD.php';
    require 'paciente.class.php';

    $u = new Paciente();

    $cpf = addslashes($_POST['cpf']);
    $senha = addslashes($_POST['senha']);

    if($u->login($cpf, $senha) == true){
        if(isset($_SESSION['idUser'])){
                header("Location: deucerto.php");
        }else{
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    //joga pra tela de login
    header("Location: index.php");
}




?>