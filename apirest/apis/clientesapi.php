<?php


$clientes  = '[

    {
        "clienteId" : "1",
        "nombreConstructora" : "Marval",
        "empleadoEncargado" : "Justin andrés corredor",
        "fecha" : "06/05/2003"
    },
    {
        "clienteId" : "2",
        "nombreConstructora" : "XFL345",
        "empleadoEncargado" : "Maria josé mendez",
        "fecha" : "06/05/2003"
    },
    {
        "clienteId" : "3",
        "nombreConstructora" : "ConstructMax",
        "empleadoEncargado" : "Daniel lopez obrador",
        "fecha" : "02/02/2023"
    }

]';

$datosClientes = json_decode($clientes, true);

$server = "localhost";
$user = "root";
$pass = "";
$bd = "alquilartemis";

$conexion = mysqli_connect($server, $user, $pass, $bd) 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

foreach ($datosClientes as $clientes) {
    mysqli_query($conexion, "INSERT INTO constructora_clientes (clientesId, nombreConstructora, empleadoEncargado, fecha) VALUES ('".$body['clientesId']."','".$body['nombreConstructora']."','".$body['empleadoEncargado']."','".$body['fecha']."')");
}

mysqli_close($conexion);



?>