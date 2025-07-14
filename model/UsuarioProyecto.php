<?php 
class UsuarioProyecto {
    private $idUsuario;
    private $idProyecto;

    function getIdUsuario() { return $this->idUsuario; }
    function setIdUsuario($idUsuario) { $this->idUsuario = $idUsuario; }

    function getIdProyecto() { return $this->idProyecto; }
    function setIdProyecto($idProyecto) { $this->idProyecto = $idProyecto; }
}
?>