<?php

require_once('../config/conectar.php');

class Clientes extends Conectar {

    public function __construct($clientesId= 0, $nombreConstructora= "", $empleadoEncargado="", $fecha=""){
        $this->clientesId = $clientesId;
        $this->nombreConstructora = $nombreConstructora;
        $this->empleadoEncargado = $empleadoEncargado;
        $this->fecha = $fecha;
        parent::__construct();
    }
    
    //Getters
    public function getClientesId(){
        return $this->clientesId;
    }

    public function getNombreConstructora(){
        return $this->nombreConstructora;
    }

    public function getEmpleadoEncargado(){
        return $this->empleadoEncargado;
    }

    public function getFecha(){
        return $this->fecha;
    }

    //Setters
    public function setClientesId($clientesId){
        $this->clientesId =$clientesId;
    }

    public function setNombreConstructora($nombreConstructora){
        $this->nombreConstructora =$nombreConstructora;
    }

    public function setEmpleadoEncargado($empleadoEncargado){
        $this->empleadoEncargado =$empleadoEncargado;
    }

    public function setFecha($fecha){
        $this->fecha =$fecha;
    }

    public function getClientes(){
        try {
            $cnx = "SELECT * FROM constructoras_clientes";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getClienteId($id) {
        try {

            $cnx = "SELECT * FROM constructoras_clientes WHERE clientesId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }
    public function insertClientes($nombreConstructora, $empleadoEncargado, $fecha){
        try {
            $cnx = "INSERT INTO constructoras_clientes(nombreConstructora,empleadoEncargado,fecha) VALUES (?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$nombreConstructora);
            $stm->bindValue(2,$empleadoEncargado);
            $stm->bindValue(3,$fecha);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtenerEmpleadoId(){
        try {
            $stm = $this-> db -> prepare("SELECT empleadoId,nombreEmpleado FROM empleados");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}



?>