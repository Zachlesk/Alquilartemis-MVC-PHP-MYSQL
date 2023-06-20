<?php

require_once('../config/conectar.php');

class DetallesCotizacion extends Conectar {


    private $detalleId;
    private $cliente;
    private $productosAlquilados;
    private $fechaAlquilado;
    private $horaAlquiler;
    private $duracionAlquiler;
    private $precioDiaAlquiler;
    private $totalCotizacion;

    public function __construct($detalleId= 0, $cliente= 0, $productosAlquilados="", $fechaAlquilado="", $horaAlquiler = "", $duracionAlquiler= "", $precioDiaAlquiler = "", $totalCotizacion = "") {
        $this->detalleId = $detalleId;
        $this->cliente = $cliente;
        $this->productosAlquilados = $productosAlquilados;
        $this->fechaAlquilado = $fechaAlquilado;
        $this->horaAlquiler = $horaAlquiler;
        $this->duracionAlquiler = $duracionAlquiler;
        $this->precioDiaAlquiler = $precioDiaAlquiler;
        $this->totalCotizacion = $totalCotizacion;
        parent::__construct();
    }
    
    //Getters
    public function getDetalleId(){
        return $this->detalleId;
    }


    public function getCliente(){
        return $this->cliente;
    }

    public function getProductosAlquilados(){
        return $this->productosAlquilados;
    }

    public function getFechaAlquilado(){
        return $this->fechaAlquilado;
    }
    
    public function getHoraAlquiler(){
        return $this->horaAlquiler;
    }

    public function getDuracionAlquiler(){
        return $this->duracionAlquiler;
    }

    public function getPrecioDiaAlquiler(){
        return $this->precioDiaAlquiler;
    }

    public function getTotalCotizacion(){
        return $this->totalCotizacion;
    }

    //Setters
    public function setDetalleId($detalleId){
        $this->detalleId =$detalleId;
    }

    public function setCliente($cliente){
        $this->cliente =$cliente;
    }

    public function setProductosAlquilados($productosAlquilados){
        $this->productosAlquilados =$productosAlquilados;
    }

    public function setFechaAlquilado($fechaAlquilado){
        $this->fechaAlquilado =$fechaAlquilado;
    }

    public function setHoraAlquiler($horaAlquiler){
        $this->horaAlquiler = $horaAlquiler;
    }

    public function setDuracionAlquiler($duracionAlquiler){
        $this->duracionAlquiler = $duracionAlquiler;
    }

    public function setPrecioDiaAlquiler($precioDiaAlquiler){
        $this->precioDiaAlquiler = $precioDiaAlquiler;
    }

    public function setTotalCotizacion($totalCotizacion){
        $this->totalCotizacion = $totalCotizacion;
    }

    public function getDetallesCotizacion(){
        try {
            $cnx = "SELECT * FROM detalle_cotizacion";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getDetallesCotizacionId($id) {
        try {
            $cnx = "SELECT * FROM detalle_cotizacion WHERE detalleId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function insertDetallesCotizacion($cliente, $productosAlquilados, $fechaAlquilado, $horaAlquiler, $duracionAlquiler, $precioDiaAlquiler, $totalCotizacion){
        try {
            $cnx = "INSERT INTO detalle_cotizacion(cliente, productosAlquilados, fechaAlquilado, horaAlquiler, duracionAlquiler, precioDiaAlquiler, totalCotizacion) VALUES (?,?,?,?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$cliente);
            $stm->bindValue(2,$productosAlquilados);
            $stm->bindValue(3,$fechaAlquilado);
            $stm->bindValue(4,$horaAlquiler);
            $stm->bindValue(5,$duracionAlquiler);
            $stm->bindValue(6,$precioDiaAlquiler);
            $stm->bindValue(7,$totalCotizacion);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }




}




?>