<?php


$alquilerDetalle  = '[

    {
        "alquilerId" : "1",
        "clientesId" : "1",
        "fechaAlquiler" : "23/02/2023",
        "horaAlquiler" : "3:00 pm",
        "subtotalPeso" : "3.000.000",
        "empleadoId" : "1",
        "placaTransporte" : "HVY619"
        "observaciones" : "Producto entregado nuevo, sin daños. Empresa con adelanto"
    
    
    },
    {
        "alquilerDetalleId" : "",
        "productosId" :"",
        "obraId" :"",
        "cantidadAlquiler" : "",
        "cantidadPropia" : "",
        "cantidadSubAlquilada" : "",
        "valorUnidad" : ""
        "fechaStandBy" : ""
        "estado" : ""
        "valorTotal" : ""
        "empleadoId" : ""
    },
    {
        "alquilerDetalleId" : "",
        "productosId" :"",
        "obraId" :"",
        "cantidadAlquiler" : "",
        "cantidadPropia" : "",
        "cantidadSubAlquilada" : "",
        "valorUnidad" : ""
        "fechaStandBy" : ""
        "estado" : ""
        "valorTotal" : ""
        "empleadoId" : ""
    },


]';

$datosAlquilerDetalle = json_decode($alquilerDetalle, true);

$server = "localhost";
$user = "root";
$pass = "";
$bd = "alquilartemis";

$conexion = mysqli_connect($server, $user, $pass, $bd) 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

foreach ($datosAlquilerDetalle as $alquilerDetalle) {
    mysqli_query($conexion, "INSERT INTO alquiler_detalle (alquilerDetalleId, productosId, obraId, cantidadAlquiler, cantidadPropia, cantidadSubAlquilada, valorUnidad, fechaStandBy, estado, valorTotal, empleadoId) VALUES ('".$body['alquilerDetalleId']."','".$body['productosId']."','".$body['obraId']."','".$body['cantidadAlquiler']."','".$body['cantidadPropia']."','".$body['cantidadSubAlquilada']."','".$body['valorUnidad']."','".$body['fechaStandBy']."','".$body['estado']."','".$body['valorTotal']."','".$body['empleadoId']."')");
}

mysqli_close($conexion);



?>