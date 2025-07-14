<?php 
class Proyecto {
    private $idProyecto;
    private $titulo;
    private $descripcion;

    function getIdProyecto() { return $this->idProyecto; }
    function setIdProyecto($idProyecto) { $this->idProyecto = $idProyecto; }

    function getTitulo() { return $this->titulo; }
    function setTitulo($titulo) { $this->titulo = $titulo; }

    function getDescripcion() { return $this->descripcion; }
    function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
}
?>