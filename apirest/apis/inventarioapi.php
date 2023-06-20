<?php

        $inventario = '[
            {
            "inventarioId":"" ,
            "productoId": "",
            "cantidadInicial": "",
            "cantidadIngresos": "",
            "cantidadSalidas": "",
            "cantidadFinal": "",
            "fechaInventario": "",
            "tipoOperacion": "
            },
            {
                "inventarioId": ,
                "productoId": ,
                "cantidadInicial": "",
                "cantidadIngresos": "",
                "cantidadSalidas": "",
                "cantidadFinal": "",
                "fechaInventario": "",
                "tipoOperacion": "
                },
        ]';
    
        $datosInventario = json_decode($inventario, true);
            
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "alquilartemis";

        $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos");

        foreach ($datosInventario as $inventario) {
            mysqli_query($conexion, "INSERT INTO inventario (inventarioId, productoId, cantidadInicial, cantidadIngresos, cantidadSalidas, cantidadFinal, fechaInventario, tipoOperacion ) VALUES ('".$body['inventarioId']."','".$body['productoId']."','".$body['cantidadInicial']"','".$body['cantidadIngresos']."','".$body['cantidadSalidas']."','".$body['cantidadFinal']."','".$body['fechaInventario']."','".$body['tipoOperacion']."')");
        }

        mysqli_close($conexion);

?>