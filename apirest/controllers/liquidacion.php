<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/liquidacion.php');

    $liquidacion = new Liquidacion();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $liquidacion-> getLiquidacion();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $liquidacion-> getLiquidacionesId($body['liquidacionId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $liquidacion-> insertLiquidacion($body['clienteId'],$body['alquilerId'], $body['valorQuincenalTotal'], $body['valorMesTotal']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/liquidacion");

            break;
            default:
            break;

    }

    ?>