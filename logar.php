<?php 

//se existir email      e for diferente de vazio
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require 'conexaoBD.php';
    require 'medico.class.php';

    $u = new Medico();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if($u->login($email, $senha) == true){
        if(isset($_SESSION['idMed'])){
                header("Location: dashboard.php");
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


// login: pedro123@medico.com
// senha: pedro123

// login: marcia@medico.com
// senha: marcia123

// login: firmino@medico.com
// senha: firmino123

?>