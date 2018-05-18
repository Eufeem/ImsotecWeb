<?php

    class Usuario {

        private $conn;

        public $idUsuario;
        public $usuario;
        public $password;
        public $rol;
        public $nombre;
        public $apPaterno;
        public $apMaterno;

        public function __construct($db){
            $this->conn = $db;
        }

        // Método Consulta
        function consulta() {
            $query = "SELECT * FROM usuarios";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        // Método Insertar
        function insertar() {
            $query = "INSERT INTO usuarios SET usuario=:usuario,
                      password=:password, rol=:rol, nombre=:nombre,
                      apPaterno=:apPaterno, apMaterno=:apMaterno";
            $stmt = $this->conn->prepare($query);
            $this->usuario   = htmlspecialchars(strip_tags($this->usuario));
            $this->password  = htmlspecialchars(strip_tags($this->password));
            $this->rol       = htmlspecialchars(strip_tags($this->rol));
            $this->nombre    = htmlspecialchars(strip_tags($this->nombre));
            $this->apPaterno = htmlspecialchars(strip_tags($this->apPaterno));
            $this->apMaterno = htmlspecialchars(strip_tags($this->apMaterno));
            $stmt->bindParam(":usuario"   , $this->usuario);
            $stmt->bindParam(":password"  , $this->password);
            $stmt->bindParam(":rol"       , $this->rol);
            $stmt->bindParam(":nombre"    , $this->nombre);
            $stmt->bindParam(":apPaterno" , $this->apPaterno);
            $stmt->bindParam(":apMaterno" , $this->apMaterno);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }

        // Método Eliminar
        function delete() {
            $query = "DELETE FROM usuarios WHERE idUsuario=:idUsuario";
            $stmt = $this->conn->prepare($query);
            $this->idUsuario  = htmlspecialchars(strip_tags($this->idUsuario));
            $stmt->bindParam(":idUsuario" , $this->idUsuario);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }

        // Método Actualizar
        function update() {
            $query = "UPDATE usuarios SET
                     usuario=:usuario, password=:password, rol=:rol, nombre=:nombre,
                     apPaterno=:apPaterno, apMaterno=:apMaterno WHERE idUsuario=:idUsuario";
            $stmt = $this->conn->prepare($query);
            $this->idUsuario = htmlspecialchars(strip_tags($this->idUsuario));
            $this->usuario   = htmlspecialchars(strip_tags($this->usuario));
            $this->password  = htmlspecialchars(strip_tags($this->password));
            $this->rol       = htmlspecialchars(strip_tags($this->rol));
            $this->nombre    = htmlspecialchars(strip_tags($this->nombre));
            $this->apPaterno = htmlspecialchars(strip_tags($this->apPaterno));
            $this->apMaterno = htmlspecialchars(strip_tags($this->apMaterno));
            $stmt->bindParam(":idUsuario" , $this->idUsuario);
            $stmt->bindParam(":usuario"   , $this->usuario);
            $stmt->bindParam(":password"  , $this->password);
            $stmt->bindParam(":rol"       , $this->rol);
            $stmt->bindParam(":nombre"    , $this->nombre);
            $stmt->bindParam(":apPaterno" , $this->apPaterno);
            $stmt->bindParam(":apMaterno" , $this->apMaterno);
            if($stmt->execute()) {
                return true;
            }
            return false;
        }
    }
?>
