<?php

        $facturacion = '[
            {
            "facturacionId":"" ,
            "clienteId": "",
            "empleadoId": "",
            "cotizacionId": "",
            "fechaFacturacion": ""
            },
            {
                "facturacionId":"" ,
                "clienteId": "",
                "empleadoId": "",
                "cotizacionId": "",
                "fechaFacturacion": ""
                }
        ]';
    
        $datosFacturacion = json_decode($facturacion, true);
            
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "alquilartemis";

        $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos");

        foreach ($datosFacturacion as $facturacion) {
            mysqli_query($conexion, "INSERT INTO facturacion (facturacionId, clienteId, empleadoId, cotizacionId, fechaFacturacion) VALUES ('".$body['facturacionId']."','".$body['clienteId']."','".$body['empleadoId']"','".$body['cotizacionId']."','".$body['fechaFacturacion']."')");
        }

        mysqli_close($conexion);

?>