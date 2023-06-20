-<?php

header('Content-Type: application/json');

require_once('../config/conectar.php');
require_once('../models/devolucionDetalles.php');

$devolucionDetalles = new DevolucionDetalles();

$body = json_decode(file_get_contents("php://input"),true);

switch ($_GET["op"]) {
    case "getAll":
        $datos = $devolucionDetalles-> getDevolucionDetalles();
        echo json_encode($datos);
        break;
    case "getId":
        $datos = $devolucionDetalles-> getDevolucionDetallesId($body['devolucionesDetallesId']);
        echo json_encode($datos);
        break;
    case "insert":
        $datos = $devolucionDetalles-> insertDevolucionDetalles($body['devolucionesId'],$body['productoId'],$body['obraId'], $body['devolucionCantidad'], $body['devolucionCantidadPropia'], $body['devolucionCantidadSubAlquilada'], $body['estado']);
        echo json_encode("Ha sido insertado correctamente");

        header("Location: http://localhost/x/devolucionDetalles");

        break;
        default:
        break;
}


?>