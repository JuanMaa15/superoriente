<?php

class TipoPantalonDTO {

    private $id_tipo_pantalon;
    private $nombre;
    
    function __construct() {
        
    }

    function constructor($id_tipo_pantalon, $nombre) {
        $this->id_tipo_pantalon = $id_tipo_pantalon;
        $this->nombre = $nombre;
       
    }
    
    function getId_tipo_pantalon() {
        return $this->id_tipo_pantalon;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_tipo_pantalon($id_tipo_pantalon) {
        $this->id_tipo_pantalon = $id_tipo_pantalon;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}