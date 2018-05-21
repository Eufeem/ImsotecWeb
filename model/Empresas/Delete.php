<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config/ConfigDB.php';
    include_once '../../object/Empresa.php';

    $dataBase = new DataBase();
    $db = $dataBase->getConnection();

    $obj = new Empresa($db);

    $data = json_decode(file_get_contents("php://input"));
    $obj->idEmpresas = $data->idEmpresas;

    if($obj->eliminar()) {
            echo '{"message": "Registro Eliminado."}';
    } else {
            echo '{"message": "Error al eliminar registro."}';
    }

 ?>
