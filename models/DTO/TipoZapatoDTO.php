<?php

class TipoZapatoDTO {

    private $id_tipo_zapato;
    private $nombre;
    
    function __construct() {
        
    }

    function constructor($id_tipo_zapato, $nombre) {
        $this->id_tipo_zapato = $id_tipo_zapato;
        $this->nombre = $nombre;
       
    }
    
    function getId_tipo_zapato() {
        return $this->id_tipo_zapato;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_tipo_zapato($id_tipo_zapato) {
        $this->id_tipo_zapato = $id_tipo_zapato;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}