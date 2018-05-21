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
    $obj->idUsuario = $data->idUsuario;
    $obj->usuario   = $data->usuario;
    $obj->password  = $data->password;
    $obj->rol       = $data->rol;
    $obj->nombre    = $data->nombre;
    $obj->apPaterno = $data->apPaterno;
    $obj->apMaterno = $data->apMaterno;

    if ($obj->actualizar()) {
        echo '{"message": "Registro actualizado."}';
    } else {
        echo '{"message": "Error al actualizar registro."}';
    }

 ?>
