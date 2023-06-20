<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/alquiler.php');

    $alquiler = new Alquiler();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $alquiler-> getAlquiler();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $alquiler-> getAlquilersId($body['alquilerId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $alquiler-> insertAlquiler($body['clientesId'],$body['fechaAlquiler'], $body['horaAlquiler'], $body['subtotalPeso'], $body['empleadoId'], $body['placaTransporte'], $body['observaciones']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/alquilartemis/alquiler");

            break;
            default:
            break;
    }


    ?>