<?php 

session_start();

$localhost = "localhost";
$user = "root";
$passw = "";
$banco = "laboratorio";

global $pdo;

// se a conexao exister e estiver tudo OK
try{
    //orientado a objetos com PDOzin
    $pdo = new PDO("mysql:dbname=".$banco."; host=".$localhost, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //caso esteja errado
}catch(PDOException $erroAchado){
    echo "Erro: ".$erroAchado->getMessage();
    exit;
}

?>