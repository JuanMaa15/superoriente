<?php

class EstadoCivilDTO {

    private $id_estado_civil;
    private $nombre;
    
    function constructor($id_estado_civil, $nombre) {
        $this->id_estado_civil = $id_estado_civil;
        $this->nombre = $nombre;
    }
    
    function getId_estado_civil() {
        return $this->id_estado_civil;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_estado_civil($id_estado_civil) {
        $this->id_estado_civil = $id_estado_civil;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}