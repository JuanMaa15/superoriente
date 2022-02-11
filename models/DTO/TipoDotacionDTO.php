<?php

class TipoDotacionDTO {

    private $id_tipo_dotacion;
    private $nombre;

    function __construct()
    {
        
    }

    function constructor($id_tipo_dotacion, $nombre) {

        $this->id_tipo_dotacion = $id_tipo_dotacion;
        $this->nombre = $nombre;

    }

    
    function getId_tipo_dotacion() {
        return $this->id_tipo_dotacion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_tipo_dotacion($id_tipo_dotacion) {
        $this->id_tipo_dotacion = $id_tipo_dotacion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}