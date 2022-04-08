<?php

class TipoCamisaDTO {

    private $id_tipo_camisa;
    private $nombre;
    
    function __construct() {
        
    }

    function constructor($id_tipo_camisa, $nombre) {
        $this->id_tipo_camisa = $id_tipo_camisa;
        $this->nombre = $nombre;
       
    }
    
    function getId_tipo_camisa() {
        return $this->id_tipo_camisa;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_tipo_camisa($id_tipo_camisa) {
        $this->id_tipo_camisa = $id_tipo_camisa;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}