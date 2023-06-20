<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/productos.php');

    $productos = new Productos();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $productos-> getProductos();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $productos-> getProductoId($body['productosId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $productos-> insertProductos($body['nombreProducto'],$body['tipoProducto'], $body['descripcionProducto'], $body['precioUnitario'], $body['stock']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/productos");

            break;
            default:
            break;
    }

    ?>