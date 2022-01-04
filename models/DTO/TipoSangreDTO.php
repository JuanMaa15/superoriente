<?php

class TipoSangreDTO {

    private $id_tipo_sangre_rh;
    private $nombre;
    
    function __construct() {
        
    }

    function constructor($id_tipo_sangre_rh, $nombre) {
        $this->id_tipo_sangre_rh = $id_tipo_sangre_rh;
        $this->nombre = $nombre;
    }

    function getId_tipo_sangre_rh() {
        return $this->id_tipo_sangre_rh;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_tipo_sangre_rh($id_tipo_sangre_rh) {
        $this->id_tipo_sangre_rh = $id_tipo_sangre_rh;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}