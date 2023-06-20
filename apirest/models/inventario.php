<?php

require_once('../config/conectar.php');

class Inventario extends Conectar {
    private $inventarioId;
    private $productoId;
    private $cantidadInicial;
    private $cantidadIngresos;
    private $cantidadSalidas;
    private $cantidadFinal;
    private $fechaInventario;
    private $tipoOperacion;



    public function __constructor($inventarioId=0,$productoId=0,$cantidadInicial="",$cantidadIngresos="",$cantidadSalidas="",$cantidadFinal="",$fechaInventario="",$tipoOperacion=""){

        $this->inventarioId = $inventarioId;
        $this->productoId = $productoId;
        $this->cantidadInicial = $cantidadInicial;
        $this->cantidadIngresos = $cantidadIngresos;
        $this->cantidadSalidas = $cantidadSalidas;
        $this->cantidadFinal = $cantidadFinal;
        $this->fechaInventario = $fechaInventario;
        $this->tipoOperacion = $tipoOperacion;
        parent::__construct();
    }

    public function setInventarioId($inventarioId){
        $this->inventarioId = $inventarioId;
    }

    public function getInventarioId(){
        return $this->inventarioId ;
    }

    public function setProductoId($productoId){
        $this->productoId = $productoId;
    }

    public function getProductoId(){
            return $this->productoId ;
        }
        
    public function setCantidadInicial($cantidadInicial){
        $this->cantidadInicial = $cantidadInicial;
    }

    public function getCantidadInicial(){
        return $this->cantidadInicial;
    }

    public function setCantidadIngresos($cantidadIngresos){
        $this->cantidadIngresos = $cantidadIngresos;
    }
    public function getCantidadIngresos(){
        return $this->cantidadIngresos;
    }
    public function setCantidadSalidas($cantidadSalidas){
        $this->cantidadSalidas = $cantidadSalidas;
    }

    public function getCantidadSalidas(){
        return $this->cantidadSalidas;
    }
    public function setCantidadFinal($cantidadFinal){
        $this->cantidadFinal = $cantidadFinal;
    }

    public function getCantidadFinal(){
        return $this->cantidadFinal;
    }
    public function setFechaInventario($fechaInventario){
        $this->fechaInventario = $fechaInventario ;
    }

    public function getFechaInventario(){
        return $this->fechaInventario ;
    }
    public function setTipoOperacion($tipoOperacion){
        $this->tipoOperacion = $tipoOperacion;
    }

    public function getTipoOperacion(){
        return $this->tipoOperacion;
    }

    public function getInventario(){
        try {
            $cnx = "SELECT * FROM inventario";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getInventariosId($id) {
        try {
            $cnx = "SELECT * FROM inventario WHERE inventarioId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function insertInventario($productoId, $cantidadInicial, $cantidadIngresos, $cantidadSalidas, $cantidadFinal, $fechaInventario, $tipoOperacion){
        try {
            $cnx = "INSERT INTO inventario (productoId, cantidadInicial, cantidadIngresos, cantidadSalidas, cantidadFinal, fechaInventario, tipoOperacion ) VALUES (?,?,?,?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$productoId);
            $stm->bindValue(2,$cantidadInicial);
            $stm->bindValue(3,$cantidadIngresos);
            $stm->bindValue(4,$cantidadSalidas);
            $stm->bindValue(5,$cantidadFinal);
            $stm->bindValue(6,$fechaInventario);
            $stm->bindValue(7,$tipoOperacion);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



}
