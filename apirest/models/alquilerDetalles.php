<?php

require_once('../config/conectar.php');

class AlquilerDetalle extends Conectar {

    private $alquilerDetalleId;
    private $productosId;
    private $obraId;
    private $cantidadAlquiler;
    private $cantidadPropia;
    private $cantidadSubAlquilada;
    private $valorUnidad;
    private $fechaStandBy;
    private $estado;
    private $valorTotal;
    private $empleadoId;

    public function __construct($alquilerDetalleId= 0, $productosId= "", $obraId="", $cantidadAlquiler="", $cantidadPropia="", $cantidadSubAlquilada=0, $valorUnidad="", $fechaStandBy="", $estado="", $valorTotal="", $empleadoId=""){
        $this->alquilerDetalleId = $alquilerDetalleId;
        $this->productosId = $productosId;
        $this->obraId = $obraId;
        $this->cantidadAlquiler = $cantidadAlquiler;
        $this->cantidadPropia = $cantidadPropia;
        $this->cantidadSubAlquilada = $cantidadSubAlquilada;
        $this->valorUnidad = $valorUnidad;
        $this->fechaStandBy = $fechaStandBy;
        $this->estado = $estado;
        $this->valorTotal = $valorTotal;
        $this->empleadoId = $empleadoId;
        parent::__construct();
    }


    public function setAlquilerDetalleId($alquilerDetalleId){
        $this->alquilerDetalleId = $alquilerDetalleId ;
    }

    public function getAlquilerDetalleId(){
        return $this->alquilerDetalleId;
    }

    public function setProductosId($productosId){
        $this->productosId = $productosId;
    }

    public function getProductosId(){
        return $this->productosId;
    }

    public function setObraId($obraId){
        $this->obraId = $obraId;
    }

    public function getObraId(){
        return $this->obraId;
    }

    public function setCantidadAlquiler($cantidadAlquiler){
        $this->cantidadAlquiler = $cantidadAlquiler;
    }

    public function getCantidadAlquiler(){
        return $this->cantidadAlquiler;
    }

    public function setCantidadPropia($cantidadPropia){
        $this->cantidadPropia = $cantidadPropia;
    }

    public function getCantidadPropia(){
        return $this->cantidadPropia;
    }

    public function setCantidadSubAlquilada($cantidadSubAlquilada){
        $this->cantidadSubAlquilada = $cantidadSubAlquilada;
    }

    public function getCantidadSubAlquilada(){
        return $this->cantidadSubAlquilada;
    }

    public function setValorUnidad($valorUnidad){
        $this->valorUnidad = $valorUnidad;
    }

    public function getValorUnidad(){
        return $this->valorUnidad;
    }

    public function setFechaStandBy($fechaStandBy){
        $this->fechaStandBy = $fechaStandBy;
    }

    public function getFechaStandBy(){
        return $this->fechaStandBy;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setValorTotal($valorTotal){
        $this->valorTotal = $valorTotal;
    }

    public function getValorTotal(){
        return $this->valorTotal;
    }

    public function setEmpleadoId($empleadoId){
        $this->empleadoId = $empleadoId;
    }

    public function getEmpleadoId(){
        return $this->empleadoId;
    }

    public function getAlquilerDetalle(){
        try {
            $cnx = "SELECT * FROM alquiler_detalle";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }


    public function getAlquilerDetallesId($id) {
        try {
            $cnx = "SELECT * FROM alquiler_detalle WHERE alquilerDetalleId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }
    public function insertAlquilerDetalle($productosId, $obraId, $cantidadAlquiler, $cantidadPropia, $cantidadSubAlquilada, $valorUnidad, $fechaStandBy, $estado, $valorTotal, $empleadoId){
        try {
            $cnx = "INSERT INTO alquiler_detalle (productosId, obraId, cantidadAlquiler, cantidadPropia, cantidadSubAlquilada, valorUnidad, fechaStandBy, estado, valorTotal, empleadoId) VALUES (?,?,?,?,?,?,?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$productosId);
            $stm->bindValue(2,$obraId);
            $stm->bindValue(3,$cantidadAlquiler);
            $stm->bindValue(4,$cantidadPropia);
            $stm->bindValue(5,$cantidadSubAlquilada);
            $stm->bindValue(6,$valorUnidad);
            $stm->bindValue(7,$fechaStandBy);
            $stm->bindValue(8,$estado);
            $stm->bindValue(9,$valorTotal);
            $stm->bindValue(10,$empleadoId);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}
