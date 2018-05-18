<?php

    class Empresa {

        private $conn;
        public $idEmpresas;
        public $nombreEmpresa;
        public $idEstatusEmpresa;
        public $estado;

        public function __construct($db){
            $this->conn = $db;
        }

        // Método Consulta
        function consulta() {
            $query = "SELECT * FROM empresas INNER JOIN estatusempresa
                      ON empresas.idEstatusEmpresa = estatusempresa.idEstatusEmpresa";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        function insertar() {
            $query = "INSERT INTO empresas SET nombreEmpresa=:nombreEmpresa, idEstatusEmpresa=:idEstatusEmpresa";
            $stmt = $this->conn->prepare($query);
            $this->nombreEmpresa = htmlspecialchars(strip_tags($this->nombreEmpresa));
            $this->idEstatusEmpresa = htmlspecialchars(strip_tags($this->idEstatusEmpresa));
            $stmt->bindParam(":nombreEmpresa", $this->nombreEmpresa);
            $stmt->bindParam(":idEstatusEmpresa", $this->idEstatusEmpresa);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }
        //
        // // Método Eliminar
        // function delete() {
        //     $query = "DELETE FROM empresas WHERE idEmpresa=:idEmpresa";
        //     $stmt = $this->conn->prepare($query);
        //     $this->idEmpresa = htmlspecialchars(strip_tags($this->idEmpresa));
        //     $stmt->bindParam(":idEmpresa", $this->idEmpresa);
        //     if($stmt->execute()) {
        //         return true;
        //     }
        //     return false;
        // }
        //
        // // Método Actualizar
        // function update() {
        //     $query = "UPDATE empresas SET SET nombre=:nombre, estatus=:estatus WHERE idEmpresa=:idEmpresa";
        //     $stmt = $this->conn->prepare($query);
        //     $this->nombre   = htmlspecialchars(strip_tags($this->nombre));
        //     $this->estatus  = htmlspecialchars(strip_tags($this->estatus));
        //     $this->idEmpresa = htmlspecialchars(strip_tags($this->idEmpresa));
        //     $stmt->bindParam(":nombre" , $this->nombre);
        //     $stmt->bindParam(":estatus", $this->estatus);
        //     $stmt->bindParam(":idEmpresa", $this->idEmpresa);
        //     if($stmt->execute()) {
        //         return true;
        //     }
        //     return false;
        // }
    }

?>
