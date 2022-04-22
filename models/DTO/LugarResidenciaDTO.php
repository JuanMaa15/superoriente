<?php

class LugarResidenciaDTO {

    private $id_lugar_residencia;
    private $nombre;

    function __construct()
    {
        
    }

    function constructor($id_lugar_residencia, $nombre) {

        $this->id_lugar_residencia = $id_lugar_residencia;
        $this->nombre = $nombre;

    }

    
    function getId_lugar_residencia() {
        return $this->id_lugar_residencia;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_lugar_residencia($id_lugar_residencia) {
        $this->id_lugar_residencia = $id_lugar_residencia;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}