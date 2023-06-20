<?php

        $obras = '[
            {
            "obraId": "1",
            "clienteId": "4",
            "nombreObra": "oxxo",
            "lugarObra": "Parque la flora"
            },
            {
                "obraId": "2",
                "clienteId": "1",
                "nombreObra": "marval",
                "lugarObra": "pidecuesta-rural"
                }
        ]';
    
        $datosObras = json_decode($obras, true);
            
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "alquilartemis";

        $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos");

        foreach ($datosObras as $obras) {
            mysqli_query($conexion, "INSERT INTO obras (obraId, clienteId, nombreObra, lugarObra) VALUES ('".$body['obraId']."','".$body['clienteId']."','".$body['nombreObra']"','".$body['lugarObra']."')");
        }

        mysqli_close($conexion);

?>