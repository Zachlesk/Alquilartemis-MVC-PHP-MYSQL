<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/detallesCotizacion.php');

    $detallesCotizacion = new DetallesCotizacion();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $detallesCotizacion-> getDetallesCotizacion();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $detallesCotizacion-> getDetallesCotizacionId($body['detalleId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $detallesCotizacion-> insertDetallesCotizacion($body['cliente'],$body['productosAlquilados'], $body['fechaAlquilado'], $body['horaAlquiler'], $body['duracionAlquiler'], $body['precioDiaAlquiler'], $body['totalCotizacion']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/detallesCotizacion");

            break;
            default:
            break;
    }


    ?>