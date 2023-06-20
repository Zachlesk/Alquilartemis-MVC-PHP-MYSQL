<?php
require_once("conectar.php");

class Users{


    private $id;
    private $empleadoId;
    private $usuario;
    private $email;
    private $password;
    $protected ;



    public function __constructor($usuario="",$email="",$password="",$id=0,$empleadoId=0){

        $this->id = $id ;
        $this->empleadoId = $empleadoId ;
        $this->usuario = $usuario ;
        $this->email = $email ;
        $this->password = $password ;

    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id ;
    }

    
    public function setEmpleadoId($empleadoId){
        $this-> = $empleadoId;
    }

    public function getEmpleadoId(){
        return $this->empleadoId ;
    }

    
    public function setUsuario($usuario){
        $this->usuario = $usuario ;
    }

    public function getUsuario(){
        return $this->usuario ;
    }

    
    public function setEmail($email){
        $this->email = $email ;
    }

    public function getEmail(){
        return $this->email ;
    }

    
    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password ;
    }

    public function insertUser(){
        try {
            $stm = $this-> cnx -> prepare("INSERT INTO users (usuario, email, password) values (?,?,?)");
            $stm -> execute([$this->usuario,$this->email,$this->password]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function allUsers(){
        try {
            $stm = $this-> cnx -> prepare("SELECT * FROM users ");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }













};






?>