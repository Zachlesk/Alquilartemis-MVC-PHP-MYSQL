<?php

require_once('../config/conectar.php');

class Empleados extends Conectar {

    private $empleadoId;
    private $nombreEmpleado;
    private $celularEmpleado;
    private $cargo;
    

    public function __construct($empleadoId= 0, $nombreEmpleado= "", $celularEmpleado="", $cargo=""){
        $this->empleadoId = $empleadoId;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->celularEmpleado = $celularEmpleado;
        $this->cargo = $cargo;
        parent::__construct();
    }
    
    //Getters
    public function getEmpleadoId(){
        return $this->empleadoId;
    }


    public function getNombreEmpleado(){
        return $this->nombreEmpleado;
    }

    public function getCelularEmpleado(){
        return $this->celularEmpleado;
    }

    public function getCargo(){
        return $this->cargo;
    }

    //Setters
    public function setEmpleadoId($empleadoId){
        $this->empleadoId =$empleadoId;
    }

    public function setNombreEmpleado($nombreEmpleado){
        $this->nombreEmpleado =$nombreEmpleado;
    }

    public function setCelularEmpleado($celularEmpleado){
        $this->celularEmpleado =$celularEmpleado;
    }

    public function setCargo($cargo){
        $this->cargo =$cargo;
    }


    public function getEmpleados(){
        try {
            $cnx = "SELECT * FROM empleados";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getEmpleadosId($id) {
        try {
            $cnx = "SELECT * FROM empleados WHERE empleadoId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function insertEmpleados($nombreEmpleado,$celularEmpleado,$cargo){
        try {
            $cnx = "INSERT INTO empleados(nombreEmpleado,celularEmpleado,cargo) VALUES (?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$nombreEmpleado);
            $stm->bindValue(2,$celularEmpleado);
            $stm->bindValue(3,$cargo);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}


?>