<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/empleado.php');

    $empleados = new Empleados();

    $body = json_decode(file_get_contents("php://input"),true) ;

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $empleados-> getEmpleados();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $empleados-> getEmpleadosId($body['empleadoId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $empleados-> insertEmpleados($body['nombreEmpleado'],$body['celularEmpleado'], $body['cargo']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/alquilartemis/empleados");

            break;
            default:
            break;
    }

    ?>