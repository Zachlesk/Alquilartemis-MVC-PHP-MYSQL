<?php

        $liquidacion = '[
            {
            "liquidacionId": "",
            "clienteId": "",
            "alquilerId": "",
            "valorQuincenalTotal":"",
            "valorMesTotal": ""
            },
            {
                "liquidacionId": "",
                "clienteId": "",
                "alquilerId": "",
                "valorQuincenalTotal":"",
                "valorMesTotal": ""
                }
        ]';
    
        $datosLiquidacion = json_decode($liquidacion, true);
            
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "alquilartemis";

        $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos");

        foreach ($datosLiquidacion as $liquidacion) {
            mysqli_query($conexion, "INSERT INTO liquidacion (liquidacionId, clienteId, alquilerId, valorQuincenalTotal, valorMesTotal) VALUES ('".$body['liquidacionId']."','".$body['clienteId']."','".$body['alquilerId']"','".$body['valorQuincenalTotal']."','".$body['valorMesTotal']."')");
        }

        mysqli_close($conexion);

?>