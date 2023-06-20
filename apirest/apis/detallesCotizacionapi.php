<?php


$detalleCotizacion  = '[

    {
        "detalleId" : "",
        "cliente" : "",
        "productoAlquilados" : "",
        "fechaAlquilado" : "",
        "horaAlquiler" : "",
        "duracionAlquiler" : "",
        "precioDiaAlquiler" : "",
        "totalCotizacion" : "",
    },
    {
        "detalleId" : "",
        "cliente" : "",
        "productoAlquilados" : "",
        "fechaAlquilado" : "",
        "horaAlquiler" : "",
        "duracionAlquiler" : "",
        "precioDiaAlquiler" : "",
        "totalCotizacion" : "",
    },
    {
        "detalleId" : "",
        "cliente" : "",
        "productoAlquilados" : "",
        "fechaAlquilado" : "",
        "horaAlquiler" : "",
        "duracionAlquiler" : "",
        "precioDiaAlquiler" : "",
        "totalCotizacion" : "",
    }

]';

$datosCotizacion = json_decode($detalleCotizacion, true);

$server = "localhost";
$user = "root";
$pass = "";
$bd = "alquilartemis";

$conexion = mysqli_connect($server, $user, $pass, $bd) 
or die("Ha sucedido un error inesperado en la conexion de la base de datos");

foreach ($datosCotizacion as $detalleCotizacion) {
    mysqli_query($conexion, "INSERT INTO detalle_cotizacion (detalleId, cliente, productosAlquilados, fechaAlquilado, horaAlquiler, duracionAlquiler, precioDiaAlquiler, totalCotizacion) VALUES ('".$body['detalleId']."','".$body['cliente']."','".$body['productosAlquilados']."','".$body['fechaAlquilado']."','".$body[' horaAlquiler']."','".$body['duracionAlquiler']."','".$body['precioDiaAlquiler']."','".$body['totalCotizacion']."')");
}

mysqli_close($conexion);



?>