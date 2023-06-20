<?php

    header('Content-Type: application/json');

    require_once('../config/conectar.php');
    require_once('../models/users.php');

    $obras = new Obras();

    $body = json_decode(file_get_contents("php://input"),true);

    switch ($_GET["op"]) {
        case "getAll":
            $datos = $users-> getUsers();
            echo json_encode($datos);
            break;
        case "getId":
            $datos = $users-> getUsersId($body['id']);
            echo json_encode($datos);
            break;
        case "insert":
            $datos = $users-> insertUsers($body['id'],$body['empleadoId'],$body['usuario'], $body['email'], $body['password']);
            echo json_encode("Ha sido insertado correctamente");

            header("Location: http://localhost/x/views/modules/pages/users/users.php");

            break;
            default:
            break;
    }

    ?>