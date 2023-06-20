<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/inventario.php');

    $inventario = new Inventario();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $inventario -> getInventario();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $inventario -> getInvetariosId($body['inventarioId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $inventario -> insertInventario($body['productoId'],$body['cantidadInicial'],  $body['cantidadIngresos'], $body['cantidadSalidas'], $body['cantidadFinal'], $body['fechaInventario'], $body['tipoOperacion']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/inventario");

            break;
            default:
            break;
    }

    ?>