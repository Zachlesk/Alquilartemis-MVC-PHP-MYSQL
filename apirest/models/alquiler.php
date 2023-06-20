<?php

require_once('../config/conectar.php');

class Alquiler extends Conectar {

    private $alquilerId;
    private $clientesId;
    private $fechaAlquiler;
    private $horaAlquiler;
    private $subtotalPeso;
    private $empleadoId;
    private $placaTransporte;
    private $observaciones;


    public function __construct($alquilerId= 0, $clientesId= "", $fechaAlquiler="", $horaAlquiler="", $subtotalPeso="", $empleadoId=0, $placaTransporte="", $observaciones=""){
        $this->alquilerId = $alquilerId;
        $this->clientesId = $clientesId;
        $this->fechaAlquiler = $fechaAlquiler;
        $this->horaAlquiler = $horaAlquiler;
        $this->subtotalPeso = $subtotalPeso;
        $this->empleadoId = $empleadoId;
        $this->placaTransporte = $placaTransporte;
        $this->observaciones = $observaciones;
        parent::__construct();
    }
    

//Getters
    public function getAlquilerId(){
        return $this->alquilerId;
    }

    public function getClientesId(){
        return $this->clientesId;
    }

    public function getFechaAlquiler(){
        return $this->fechaAlquiler;
    }

    public function getHoraAlquiler(){
            return $this->horaAlquiler;
    }

    public function getSubtotalPeso(){
        return $this->subtotalPeso;
    }

    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function getPlacaTransporte(){
        return $this->placaTransporte;
    }

    public function getObservaciones(){
        return $this->observaciones;
    }

     //Setters

     public function setAlquilerId($alquilerId){
        $this->alquilerId = $alquilerId;
    }

    public function setClienteId($clienteId){
        $this->clientesId = $clienteId;
    }

    public function setFechaAlquiler($fechaAlquiler){
        $this->fechaAlquiler = $fechaAlquiler;
    }

    public function setHoraAlquiler($horaAlquiler){
        $this->horaAlquiler = $horaAlquiler;
    }

    public function setSubtotalPeso($subtotalPeso){
        $this->subtotalPeso = $subtotalPeso;
    }

    public function setEmpleadoId($empleadoId){
        $this->empleadoId = $empleadoId;
    }

    public function setPlacaTransporte($placaTransporte){
        $this->placaTransporte = $placaTransporte;
    }

    public function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }




    public function getAlquiler(){
        try {
            $cnx = "SELECT * FROM alquiler";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getAlquilersId($id) {
        try {
            $cnx = "SELECT * FROM alquiler WHERE alquilerId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function insertAlquiler($clientesId, $fechaAlquiler, $horaAlquiler, $subtotalPeso, $empleadoId, $placaTransporte, $observaciones){
        try {
            $cnx = "INSERT INTO alquiler(clientesId,fechaAlquiler,horaAlquiler,subtotalPeso,empleadoId,placaTransporte,observaciones) VALUES (?,?,?,?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$clientesId);
            $stm->bindValue(2,$fechaAlquiler);
            $stm->bindValue(3,$horaAlquiler);
            $stm->bindValue(4,$subtotalPeso);
            $stm->bindValue(5,$empleadoId);
            $stm->bindValue(6,$placaTransporte);
            $stm->bindValue(7,$observaciones);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }




}


?>