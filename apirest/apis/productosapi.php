<?php

        $productos = '[
            {
                "productosId": "",
                "nombreProducto": "",
                "tipoProducto": "",
                "descripcionProducto": "",
                "precioUnitario": "",
                "stock": "",
                },
            {
                "productosId": "",
                "nombreProducto": "",
                "tipoProducto": "",
                "descripcionProducto": "",
                "precioUnitario": "",
                "stock": "",
                }
        ]';
    
        $datosProductos = json_decode($productos, true);
            
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "alquilartemis";

        $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos");

        foreach ($datosProductos as $productos) {
            mysqli_query($conexion, "INSERT INTO productos (productosId, nombreProducto, tipoProducto, descripcionProducto, precioUnitario, stock) VALUES ('".$body['productosId']."','".$body['nombreProducto']."','".$body['tipoProducto']"','".$body['descripcionProducto']."','".$body['precioUnitario']."','".$body['stock']."')");
        }

        mysqli_close($conexion);

?>