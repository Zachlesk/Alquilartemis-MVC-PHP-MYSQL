<?php

        $users = '[
            {
                "id": "",
                "empleadoId": "",
                "usuario": "",
                "email": "",
                "password": ""
                },
                {
                    "id": "",
                    "empleadoId": "",
                    "usuario": "",
                    "email": "",
                    "password": ""
                    },
        ]';
    
        $datosUsers = json_decode($users, true);
            
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "alquilartemis";

        $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos");

        foreach ($datosUsers as $users) {
            mysqli_query($conexion, "INSERT INTO productos (id, empleadoId, usuario, email, password) VALUES ('".$body['id']."','".$body['empleadoId']."','".$body['usuario']"','".$body['email']."','".$body['password']."')");
        }

        mysqli_close($conexion);

?>