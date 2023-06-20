<?php

require_once('../config/conectar.php');

class Obras extends Conectar {

    private $obraId;
    private $clienteId;
    private $nombreObra;
    private $lugarObra;

    public function __constructor($obraId=0,$clienteId=0,$nombreObra="",$lugarObra=""){

        $this->obraId = $obraId;
        $this->clienteId = $clienteId ;
        $this->nombreObra = $nombreObra ;
        $this->lugarObra = $lugarObra ;
        parent::__construct();
    }

    public function setObraId($obraId){
        $this->obraId = $obraId ;
    }

    public function getObraId(){
        return $this->obraId ;
    }

    public function setClienteId($clienteId){
        $this->clienteId = $clienteId ;
    }
    public function getClienteId(){
        return $this->clienteId;
    }

    
    public function setNombreObra($nombreObra){
        $this->nombreObra = $nombreObra ;
    }
    public function getNombreObra(){
        return $this->nombreObra;
    }
 
    public function setLugarObra($lugarObra){
        $this->lugarObra = $lugarObra ;
    }

    public function getLugarObra(){
        return $this->lugarObra ;
    }


    public function getObras(){
        try {
            $cnx = "SELECT * FROM obras";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }


    public function getObrasId($id) {
        try {
            $cnx = "SELECT * FROM obras WHERE obraId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }

    public function insertObras($obraId, $clienteId, $nombreObra, $lugarObra){
        try {
            $cnx = "INSERT INTO obras (clienteId, nombreObra, lugarObra) VALUES (?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$clienteId);
            $stm->bindValue(2,$nombreObra);
            $stm->bindValue(3,$lugarObra);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

?>