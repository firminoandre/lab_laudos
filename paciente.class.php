<?php


class Paciente{


    public function login($cpf, $senha){
        global $pdo;

        $sql = "SELECT * FROM pacientes WHERE cpf = :cpf AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("cpf", $cpf);
        $sql->bindValue("senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            
            //criando uma sessao para o usuario logado
            $_SESSION['idUser'] = $dado['idpaciente'];

            return true;
        }else{
            return false;
        }
    }

    public function logado($id){
        global $pdo;

        $array = array();
        $sql = "SELECT idpaciente FROM pacientes WHERE idpaciente = :idpaciente";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idpaciente", $id);
        $sql->execute();
        

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function logado2($id){
        global $pdo;

        $array = array();
        $sql = "SELECT nome FROM pacientes WHERE idpaciente = :idpaciente";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("idpaciente", $id);
        $sql->execute();
        

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }
}

?>