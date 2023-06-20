<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/obras.php');

    $obras = new Obras();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $obras-> getObras();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $obras-> getObrasId($body['obraId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $obras-> insertObras($body['obraId'],$body['clienteId'],$body['nombreObra'], $body['lugarObra']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/obras");

            break;
            default:
            break;
    }

    ?>