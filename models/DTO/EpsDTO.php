<?php

class EpsDTO {

    private $id_eps;
    private $nombre;

    function __construct()
    {
        
    }

    function constructor($id_eps, $nombre) {

        $this->id_eps = $id_eps;
        $this->nombre = $nombre;

    }

    
    function getId_eps() {
        return $this->id_eps;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_eps($id_eps) {
        $this->id_eps = $id_eps;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}