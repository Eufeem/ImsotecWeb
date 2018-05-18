<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../../config/ConfigDB.php';
    include_once '../../object/Empresa.php';

    $dataBase = new DataBase();
    $db = $dataBase->getConnection();
    $obj = new Empresa($db);

    $stmt = $obj->consulta();
    $num  = $stmt->rowCount();

    if ($num > 0) {
        $obj_arr = array();
        $obj_arr["records"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $obj_item = array(
                    "idEmpresa"        => $idEmpresas,
                    "nombreEmpresa"    => $nombreEmpresa,
                    "idEstatusEmpresa" => $idEstatusEmpresa,
                    "estado"           => $estado
            );
            array_push($obj_arr["records"], $obj_item);
        }
        echo json_encode($obj_arr);
    } else {
        echo json_encode(array("mensaje" => "usuarios no encontrados."));
    }
?>
