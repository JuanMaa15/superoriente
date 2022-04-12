<?php

class ClaseRiesgoDTO {

    private $id_clase_riesgo;
    private $nombre;
    private $porcentaje;

    function __construct()
    {
        
    }

    function constructor($id_clase_riesgo, $nombre, $porcentaje) {

        $this->id_clase_riesgo = $id_clase_riesgo;
        $this->nombre = $nombre;
        $this->porcentaje = $porcentaje;

    }

    function getId_clase_riesgo() {
        return $this->id_clase_riesgo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPorcentaje() {
        return $this->porcentaje;
    }

    function setId_clase_riesgo($id_clase_riesgo) {
        $this->id_clase_riesgo = $id_clase_riesgo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPorcentaje($porcentaje) {
        $this->porcentaje = $porcentaje;
    }

}