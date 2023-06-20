<?php


$devoluciones  = '[

    {
        "devolucionesId" : "1",
        "alquilerId" : "1",
        "empleadoId" : "1",
        "clienteId" : "1",
        "fechaDevolucion" : "19/05/2022",
        "horaDevolucion" : "3:00 pm",
        "observaciones" : "Entregado en perfectas condiciones. No ajusto las necesidades del cliente."
    
    
    },
    {
        "devolucionesId" : "2",
        "alquilerId" : "2",
        "empleadoId" : "2",
        "clienteId" : "2",
        "fechaDevolucion" : "30/06/2023",
        "horaDevolucion" : "9:00 am",
        "observaciones" : "Entregado en malas condiciones."
    
    
    },
    {
        "devolucionesId" : "3",
        "alquilerId" : "3",
        "empleadoId" : "3",
        "clienteId" : "3",
        "fechaDevolucion" : "27/04/2023",
        "horaDevolucion" : "8:00 pm",
        "observaciones" : "Entregado en condiciones lamentables. Mal uso."
    
    
    },


]';

$datosDevoluciones = json_decode($devoluciones, true);

$server = "localhost";
$user = "root";
$pass = "";
$bd = "alquilartemis";

$conexion = mysqli_connect($server, $user, $pass, $bd) 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

foreach ($datosDevoluciones as $devoluciones) {
    mysqli_query($conexion, "INSERT INTO devoluciones (devolucionesId, alquilerId, empleadoId, clienteId, fechaDevolucion, horaDevolucion, observaciones) VALUES ('".$body['devolucionesId']."','".$body['alquilerId']."','".$body['empleadoId']."','".$body['clienteId']."','".$body['fechaDevolucion']."','".$body['horaDevolucion']."','".$body['observaciones']."')");
}

mysqli_close($conexion);



?>