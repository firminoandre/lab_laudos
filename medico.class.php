<?php


class Medico{


    public function login($email, $senha){
        global $pdo;

        $sql = "SELECT * FROM medicos WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            
            //criando uma sessao para o usuario logado
            $_SESSION['idMed'] = $dado['idmedico'];

            return true;
        }else{
            return false;
        }
    }

    public function logado($id){
        global $pdo;

        $array = array();
        $sql = "SELECT idmedico FROM medicos WHERE idmedico = :idmedico";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idmedico", $id);
        $sql->execute();
        

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function logado2($id){
        global $pdo;

        $array = array();
        $sql = "SELECT nome FROM medicos WHERE idmedico = :idmedico";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idmedico", $id);
        $sql->execute();
        

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function buscarDadosPaciente($id){
        global $pdo;

        $res = array();
        $sql = "SELECT * FROM laudos WHERE idlaudo = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        $res = $sql->fetch(PDO::FETCH_ASSOC);
        return $res; 
    }

    public function atualizarPaciente(){

    }
}

?>