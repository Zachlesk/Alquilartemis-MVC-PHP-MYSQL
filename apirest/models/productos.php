<?php

require_once('../config/conectar.php');

class Productos extends Conectar {

    private $productosId;
    private $nombreProducto;
    private $tipoProducto;
    private $descripcionProducto;
    private $precioUnitario;
    private $stock;
    

    public function __construct($productosId= 0, $nombreProducto= "", $tipoProducto="", $descripcionProducto="", $precioUnitario="", $stock=""){
        $this->productosId = $productosId;
        $this->nombreProducto = $nombreProducto;
        $this->tipoProducto = $tipoProducto;
        $this->descripcionProducto = $descripcionProducto;
        $this->precioUnitario = $precioUnitario;
        $this->stock = $stock;
        parent::__construct();
    }
    
    //Getters
    public function getProductosId(){
        return $this->productosId;
    }

    public function getNombreProducto(){
        return $this->nombreProducto;
    }

    public function getTipoProducto(){
        return $this->tipoProducto;
    }

    public function getDescripcionProducto(){
        return $this->descripcionProducto;
    }
    
    public function getPrecioUnitario(){
        return $this->precioUnitario;
    }

    public function getStock(){
        return $this->stock;
    }

    //Setters
    public function setProductosId($productosId){
        $this->productosId =$productosId;
    }

    public function setNombreProducto($nombreProducto){
        $this->nombreProducto =$nombreProducto;
    }

    public function setTipoProducto($tipoProducto){
        $this->tipoProducto = $tipoProducto;
    }

    public function setDescripcionProducto($descripcionProducto){
        $this->descripcionProducto =$descripcionProducto;
    }

    public function setPrecioUnitario($precioUnitario){
        $this->precioUnitario = $precioUnitario;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }


    public function getProductos(){
        try {
            $cnx = "SELECT * FROM productos";
            $stm = $this-> db -> prepare($cnx);
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    public function getProductoId($id) {
        try {
            $cnx = "SELECT * FROM productos WHERE productosId= ?";
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$id);
            $stm -> execute();  
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e-> getMessage();
        }
    }
    

    public function insertProductos($nombreProducto, $tipoProducto, $descripcionProducto, $precioUnitario, $stock){
        try {
            $cnx = "INSERT INTO productos (nombreProducto, tipoProducto, descripcionProducto, precioUnitario, stock) VALUES (?,?,?,?,?)"; 
            $stm = $this-> db -> prepare($cnx);
            $stm->bindValue(1,$nombreProducto);
            $stm->bindValue(2,$tipoProducto);
            $stm->bindValue(3,$descripcionProducto);
            $stm->bindValue(4,$precioUnitario);
            $stm->bindValue(5,$stock);
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}

?>

