<?php

        $empleados = '[
            {
            "empleadoId": "1",
            "nombreEmpleado": "Angie Suarez",
            "celularEmpleado": "26",
            "cargo": "Psico-analisis"
            },
            {
            "empleadoId": "2",
            "nombreEmpleado": "Vanessa",
            "celularEmpleado": "25",
            "cargo": "Jefe de area"
            }
        ]';
    
        $datosEmpleados = json_decode($empleados, true);
            
        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "alquilartemis";

        $conexion = mysqli_connect($server, $user, $pass, $bd) 
        or die("Ha sucedido un error inesperado en la conexion de la base de datos");

        foreach ($datosEmpleados as $empleados) {
            mysqli_query($conexion, "INSERT INTO empleados (empleadoId, nombreEmpleado, celularEmpleado, cargo) VALUES ('".$body['empleadoId']."','".$body['nombreEmpleado']."','".$body['celularEmpleado']."','".$body['cargo']."')");
        }

        mysqli_close($conexion);

?>