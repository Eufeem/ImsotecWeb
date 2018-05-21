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

        // Consulta
        function consulta() {
            $query = "SELECT * FROM empresas INNER JOIN estatusempresa
                      ON empresas.idEstatusEmpresa = estatusempresa.idEstatusEmpresa";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        // Insertar
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

        // Eliminar
        function eliminar() {
            $query = "DELETE FROM empresas WHERE idEmpresas=:idEmpresas";
            $stmt = $this->conn->prepare($query);
            $this->idEmpresas = htmlspecialchars(strip_tags($this->idEmpresas));
            $stmt->bindParam(":idEmpresas", $this->idEmpresas);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }

        // Actualizar
        function actualizar() {
            $query = "UPDATE empresas SET nombreEmpresa=:nombreEmpresa, idEstatusEmpresa=:idEstatusEmpresa
                      WHERE idEmpresas=:idEmpresas";
            $stmt = $this->conn->prepare($query);
            $this->idEmpresas = htmlspecialchars(strip_tags($this->idEmpresas));
            $this->nombreEmpresa = htmlspecialchars(strip_tags($this->nombreEmpresa));
            $this->idEstatusEmpresa = htmlspecialchars(strip_tags($this->idEstatusEmpresa));
            $stmt->bindParam(":idEmpresas", $this->idEmpresas);
            $stmt->bindParam(":nombreEmpresa", $this->nombreEmpresa);
            $stmt->bindParam(":idEstatusEmpresa", $this->idEstatusEmpresa);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }
    }

?>
