<?php

class DocumentoDTO {
    
    private $id_documento;
    private $usuario;
    private $nombre;
    private $ruta;
    private $fecha;
    
    function __construct() {
        
    }

    
    function constructor($id_documento, $usuario, $nombre, $ruta, $fecha) {
        $this->id_documento = $id_documento;
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->fecha = $fecha;
    }

    function getId_documento() {
        return $this->id_documento;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getRuta() {
        return $this->ruta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId_documento($id_documento) {
        $this->id_documento = $id_documento;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}