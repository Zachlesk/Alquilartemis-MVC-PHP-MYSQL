<?php

require_once('../config/conectar.php');

class Liquidacion extends Conectar {


    private $liquidacionId;
    private $clienteId;
    private $alquilerId;
    private $valorQuincenalTotal;
    private $valorMesTotal;



    public function __constructor($liquidacionId=0,$clienteId=0,$alquilerId=0,$valorQuincenalTotal="",$valorMesTotal=""){

        $this->liquidacionId = $liquidacionId ;
        $this->clienteId = $clienteId ;
        $this->alquilerId = $alquilerId ;
        $this->valorQuincenalTotal = $valorQuincenalTotal ;
        $this->valorMesTotal = $valorMesTotal ;
        parent::__construct();
    }

    public function setLiquidacionId($liquidacionId){
        $this->liquidacionId = $liquidacionId ;
    }

    public function getLiquidacionId(){
        return $this->liquidacionId;
    }

    
    public function setClienteId($clienteId){
        $this->clienteId = $clienteId;
    }

    public function getClienteId(){
        return $this->clienteId;
    }
    
    public function setAlquilerId($alquilerId){
        $this->alquilerId = $alquilerId ;
    }

    public function getAlquilerId(){
        return $this->alquilerId ;
    }
    
    public function setValorQuincenalTotal($valorQuincenalTotal){
        $this->valorQuincenalTotal = $valorQuincenalTotal ;
    }

    public function getValorQuincenalTotal(){
        return $this->valorQuincenalTotal ;
    }
    
    public function setValorMesTotal($valorMesTotal){
        $this->valorMesTotal = $valorMesTotal ;
    }

    public function getValorMesTotal(){
        return $this->valorMesTotal ;
    }


    public function getLiquidacion(){
        try {
            $cnx = "SELECT * FROM liquidacion";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function getLiquidacionesId($id) {
        try {
            $cnx = "SELECT * FROM liquidacion WHERE liquidacionId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function insertLiquidacion($clienteId, $alquilerId, $valorQuincenalTotal, $valorMesTotal){
        try {
            $cnx = "INSERT INTO liquidacion (clienteId, alquilerId, valorQuincenalTotal, valorMesTotal) VALUES (?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$clienteId);
            $stm->bindValue(2,$alquilerId);
            $stm->bindValue(3,$valorQuincenalTotal);
            $stm->bindValue(4,$valorMesTotal);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}


?>