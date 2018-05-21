<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config/ConfigDB.php';
    include_once '../../object/Usuario.php';

    $dataBase = new DataBase();
    $db = $dataBase->getConnection();

    $obj = new Usuario($db);

    $data = json_decode(file_get_contents("php://input"));
    $obj->idUsuario  = $data->idUsuario;

    if($obj->eliminar()) {
            echo '{"message": "Registro Eliminado."}';
    } else {
            echo '{"message": "Error al eliminar registro."}';
    }

 ?>
