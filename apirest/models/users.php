<?php

require_once('../config/conectar.php');

class Users extends Conectar {

    public function getUsers(){
        try {
            $conectar = parent::Conexion;
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM users");
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getUsersId($id) {
        try {
            $conectar = parent::Conexion;
            parent::set_name();
            $stm = $conectar->prepare("SELECT * FROM users WHERE id= ?");
            $stm->bindValue(1,$id);
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function insertUsers($id, $empleadoId, $usuario, $email, $password){
        $id = $_POST["id"];
        $empleadoId = $_POST["empleadoId"];
        $usuario = $_POST["usuario"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $conectar=parent::Conexion;
        parent::setname();
        $stm -> "INSERT INTO users";
    }

}

?>