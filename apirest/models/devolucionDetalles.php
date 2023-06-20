<?php

require_once('../config/conectar.php');

class DevolucionDetalles extends Conectar {

    private $devolucionesDetalleId;
    private $devolucionesId;
    private $productoId;
    private $obraId;
    private $devolucionesCantidad;
    private $devolucionesCantidadPropia;
    private $devolucionesCantidadSubAlquilada;
    private $estado;

    public function __construct($devolucionesDetalleId= 0, $devolucionesId= 0, $productoId="", $obraId="", $devolucionesCantidad = "", $devolucionesCantidadPropia= "", $devolucionesCantidadSubAlquilada = "", $estado= "") {
        $this->devolucionDetalleId = $devolucionDetalleId;
        $this->devolucionesId = $devolucionesId;
        $this->productoId = $productoId;
        $this->obraId = $obraId;
        $this->devolucionesCantidad = $devolucionesCantidad;
        $this->devolucionesCantidadPropia = $devolucionesCantidadPropia;
        $this->devolucionesCantidadSubAlquilada = $devolucionesCantidadSubAlquilada;
        $this->estado = $estado;
        parent::__construct();
    }
    

    public function getDevolucionDetalles(){
        try {
            $cnx = "SELECT * FROM devoluciones_detalle";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getDevolucionDetallesId($id) {
        try {
            $cnx = "SELECT * FROM devoluciones_detalle";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }


    public function insertDevolucionDetalles($devolucionesId, $productoId, $obraId, $devolucionCantidad, $devolucionCantidadPropia, $devolucionCantidadSubAlquilada, $estado){
        try {
            $cnx = "INSERT INTO devoluciones_detalles (devolucionesId, productoId, obraId, devolucionCantidad, devolucionCantidadPropia, devolucionCantidadSubAlquilada, estado) VALUES (?,?,?,?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$devolucionesId);
            $stm->bindValue(2,$productoId);
            $stm->bindValue(3,$obraId);
            $stm->bindValue(4,$devolucionCantidad);
            $stm->bindValue(5,$devolucionCantidadPropia);
            $stm->bindValue(6,$devolucionCantidadSubAlquilada);
            $stm->bindValue(7,$estado);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}


?>