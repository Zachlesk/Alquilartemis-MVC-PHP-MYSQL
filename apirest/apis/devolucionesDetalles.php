<?php

        $devolucionesDetalles = '[
            {
            "devolucionesDetalleId": "",  
            "devolucionesId": "",
            "productoId ": "",
            "obraId": "",
            "devolucionCantidad": "",
            "devolucionCantidadPropia": "",
            "devolucionCantidadSubAlquilada": "",
            "estado": "",
            },
            {
                "devolucionesDetalleId": "",  
                "devolucionesId": "",
                "productoId ": "",
                "obraId": "",
                "devolucionCantidad": "",
                "devolucionCantidadPropia": "",
                "devolucionCantidadSubAlquilada": "",
                "estado": "",
                },
           
        ]';
    
        $datosDevolucionesDetalles = json_decode($devolucionesDetalles, true);
            
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "alquilartemis";

        $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos");

        foreach ($datosDevolucionesDetalles as $devolucionesDetalles) {
            mysqli_query($conexion, "INSERT INTO devoluciones_detalles (devolucionesDetalleId, devolucionesId, productoId, obraId, devolucionCantidad, devolucionCantidadPropia, devolucionCantidadSubAlquilada, estado) VALUES ('".$body['devolucionesDetalleId']."','".$body['devolucionesId ']."','".$body['productoId']."','".$body[' obraId']."','".$body['devolucionCantidad']."','".$body['devolucionCantidadPropia']."','".$body['devolucionCantidadSubAlquilada']."','".$body['estado']."')");
        }

        mysqli_close($conexion);

?>