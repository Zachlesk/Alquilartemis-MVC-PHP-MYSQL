<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/devolucion.php');

    $devolucion = new Devolucion();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $devolucion-> getDevolucion();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $devolucion-> getDevolucionId($body['devolucionesId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $devolucion-> insertDevolucion($body['alquilerId'],$body['empleadoId'], $body['clienteId'], $body['fechaDevolucion'], $body['horaDevolucion'], $body['observaciones']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/devoluciones");

            break;
            default:
            break;
    }


    ?>