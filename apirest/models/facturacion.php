<?php

require_once('../config/conectar.php');

class Facturacion extends Conectar {
    private $facturacionId;
    private $clienteId;
    private $empleadoId;
    private $cotizacionId;
    private $fechaFacturacion;

    public function __construct($facturacionId= 0, $clienteId= 0, $empleadoId=0, $cotizacionId=0, $fechaFacturacion=""){
        $this->facturacionId = $facturacionId;
        $this->clienteId = $clienteId;
        $this->empleadoId = $empleadoId;
        $this->cotizacionId = $cotizacionId;
        $this->fechaFacturacion = $fechaFacturacion;
        parent::__construct();
    }
    
    //Getters
    public function getFacturacionId(){
        return $this->facturacionId;
    }


    public function getClienteId(){
        return $this->clienteId;
    }

    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function getCotizacionId(){
        return $this->cotizacionId;
    }

    public function getFechaFacturacion(){
        return $this->fechaFacturacion;
    }


    //Setters
    public function setFacturacionId($facturacionId){
        $this->facturacionId =$facturacionId;
    }

    public function setClienteId($clienteId){
        $this->clienteId = $clienteId;
    }

    public function setEmpleadoId($empleadoId){
        $this->empleadoId =$empleadoId;
    }

    public function setCotizacionId($cotizacionId){
        $this->cotizacionId = $cotizacionId;
    }

    public function setFechaFacturacion($fechaFacturacion){
        $this->fechaFacturacion = $fechaFacturacion;
    }

    public function getFacturacion(){
        try {
            $cnx = "SELECT * FROM facturacion";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getFacturacionesId($id) {
        try {
            $cnx = "SELECT * FROM facturacion WHERE facturacionId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function insertFacturacion($clienteId, $empleadoId, $cotizacionId, $fechaFacturacion){
        try {
            $cnx = "INSERT INTO facturacion (clienteId, empleadoId, cotizacionId, fechaFacturacion) VALUES (?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$clienteId);
            $stm->bindValue(2,$empleadoId);
            $stm->bindValue(3,$cotizacionId);
            $stm->bindValue(4,$fechaFacturacion);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }




}
