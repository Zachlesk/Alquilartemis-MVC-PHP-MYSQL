<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/alquilerDetalles.php');

    $alquilerDetalle = new AlquilerDetalle();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $alquilerDetalle-> getAlquilerDetalle();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $alquilerDetalle-> getAlquilerDetallesId($body['alquilerDetalleId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $alquilerDetalle-> insertAlquilerDetalle($body['productosId'],$body['obraId'], $body['cantidadAlquiler'], $body['cantidadPropia'], $body['cantidadSubAlquilada'], $body['valorUnidad'], $body['fechaStandBy'],$body['estado'],$body['valorTotal'],$body['empleadoId']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/alquilerDetalle");

            break;
            default:
            break;
    }


    ?>