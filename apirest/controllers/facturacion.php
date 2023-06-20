<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/facturacion.php');

    $facturacion = new Facturacion();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $facturacion-> getFacturacion();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $facturacion-> getFacturacionId($body['facturacionId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $facturacion-> insertFacturacion($body['clienteId'],$body['empleadoId'], $body['cotizacionId'], $body['fechaFacturacion']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/views/modules/pages/facturacion/facturacion.php");

            break;
            default:
            break;
    }

    ?>