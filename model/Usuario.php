<?php 
class Usuario {
    private $idUsuario;
    private $nombre;
    private $correo;
    private $password;
    private $idRol;

    function getId() { return $this->idUsuario;  }
    function setId($idUsuario) { $this->idUsuario = $idUsuario; }

    function getNombre() { return $this->nombre;  }
    function setNombre($nombre) { $this->nombre = $nombre; }

    function getCorreo() { return $this->correo;  }
    function setCorreo($correo) { $this->correo = $correo; }

    function getPassword() { return $this->password;  }
    function setPassword($password) { $this->password = $password; }

    function getIdRol() { return $this->idRol;  }
    function setIdRol($idRol) { $this->idRol = $idRol; }
}
?>