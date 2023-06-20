<?php

require_once('../config/conectar.php');

class Devolucion extends Conectar {

    private $devolucionesId;
    private $alquilerId;
    private $empleadoId;
    private $clienteId;
    private $fechaDevolucion;
    private $horaDevolucion;
    private $observaciones;


    public function __constructor($devolucionesId=0,$alquilerId=0,$empleadoId=0,$clienteId=0,$fechaDevolucion="",$horaDevolucion="",$observaciones=""){

        $this->devolucionesId = $devolucionesId ;
        $this->alquilerId = $alquilerId ;
        $this->empleadoId = $empleadoId ;
        $this->clienteId = $clienteId ;
        $this->fechaDevolucion = $fechaDevolucion ;
        $this->horaDevolucion = $horaDevolucion ;
        $this->observaciones = $observaciones ;
        parent::__construct();
        
    }

    public function setDevolucionesId($devolucionesId){
        $this->devolucionesId = $devolucionesId ;
    }

    public function getDevolucionesId(){
        return $this->devolucionesId ;
    }
    public function setAlquilerId($alquilerId){
        $this->alquilerId = $alquilerId ;
    }

    public function getAlquilerId(){
        return $this->alquilerId ;
    }
    public function setEmpleadoId($empleadoId){
        $this->empleadoId = $empleadoId ;
    }

    public function getEmpleadoId(){
        return $this->empleadoId ;
    }
    public function setClienteId($clienteId){
        $this->clienteId = $clienteId ;
    }

    public function getClienteId(){
        return $this->ClienteId;
    }
    public function setFechaDevolucion($fechaDevolucion){
        $this->fechaDevolucion = $fechaDevolucion ;
    }

    public function getFechaDevolucion(){
        return $this->FechaDevolucion;
    }
    public function setHoraDevolucion($horaDevolucion){
        $this->horaDevolucion = $horaDevolucion ;
    }

    public function getHoraDevolucion(){
        return $this->horaDevolucion ;
    }
    public function setObservaciones($observaciones){
        $this->observaciones = $observaciones ;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }

    public function getDevolucion(){
        try {
            $cnx = "SELECT * FROM devoluciones";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getDevolucionId($id) {
        try {
            $cnx = "SELECT * FROM devoluciones WHERE devolucionesId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }


    public function insertDevolucion($alquilerId, $empleadoId, $clientesId, $fechaDevolucion, $horaDevolucion, $observaciones){
        try {
            $cnx = "INSERT INTO devoluciones (alquilerId, empleadoId, clienteId, fechaDevolucion, horaDevolucion, observaciones) VALUES (?,?,?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$alquilerId);
            $stm->bindValue(2,$empleadoId);
            $stm->bindValue(3,$clientesId);
            $stm->bindValue(4,$fechaDevolucion);
            $stm->bindValue(5,$horaDevolucion);
            $stm->bindValue(6,$observaciones);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}


?>