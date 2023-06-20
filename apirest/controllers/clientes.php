<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/clientes.php');

    $cliente = new Clientes();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $cliente-> getClientes();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $cliente-> getClientesId($body['clientesId']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $cliente-> insertClientes($body['nombreConstructora'],$body['empleadoEncargado'], $body['fecha']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/alquilartemis/constructoraClientes");

            break;
            default:
            break;
    }


    ?>