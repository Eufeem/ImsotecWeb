<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../../config/ConfigDB.php';
    include_once '../../object/Usuario.php';

    $dataBase = new DataBase();
    $db = $dataBase->getConnection();
    $usr = new Usuario($db);

    $stmt = $usr->consulta();
    $num  = $stmt->rowCount();

    if ($num > 0) {
        $usr_arr = array();
        $usr_arr["records"] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $usr_item = array(
                    "idUsuario" => $idUsuario,
                    "usuario"   => $usuario,
                    "password"  => $password,
                    "rol"       => $rol,
                    "nombre"    => $nombre,
                    "apPaterno" => $apPaterno,
                    "apMaterno" => $apMaterno
            );
            array_push($usr_arr["records"], $usr_item);
        }
        echo json_encode($usr_arr);
    } else {
        echo json_encode(array("mensaje" => "usuarios no encontrados."));
    }
?>
