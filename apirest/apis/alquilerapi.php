<?php


$alquiler  = '[

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
        "alquilerId" : "2",
        "clientesId" : "3",
        "fechaAlquiler" : "25/04/2023",
        "horaAlquiler" : "5:00 am",
        "subtotalPeso" : "500.000",
        "empleadoId" : "5",
        "placaTransporte" : "FSE782"
        "observaciones" : "Producto entregado con ligeros rasguños. Empresa nueva"
    
    
    },
    {
        "alquilerId" : "3",
        "clientesId" : "6",
        "fechaAlquiler" : "04/06/2023",
        "horaAlquiler" : "9:00 am",
        "subtotalPeso" : "690.000",
        "empleadoId" : "1",
        "placaTransporte" : "PRA560"
        "observaciones" : "Producto entregado con alquiler , sin daños. Empresa con adelanto"
    
    
    },


]';

$datosAlquiler = json_decode($alquiler, true);

$server = "localhost";
$user = "root";
$pass = "";
$bd = "alquilartemis";

$conexion = mysqli_connect($server, $user, $pass, $bd) 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

foreach ($datosAlquiler as $alquiler) {
    mysqli_query($conexion, "INSERT INTO alquiler (alquilerId, clientesId, fechaAlquiler, horaAlquiler, subtotalPeso, empleadoId, placaTransporte, observaciones) VALUES ('".$body['alquilerId']."','".$body['clientesId']."','".$body['fechaAlquiler']."','".$body['horaAlquiler']."','".$body['subtotalPeso']."','".$body['empleadoId']."','".$body['placaTransporte']."','".$body['observaciones']."')");
}

mysqli_close($conexion);



?>