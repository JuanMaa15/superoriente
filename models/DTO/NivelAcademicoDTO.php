<?php

class NivelAcademicoDTO {

    private $id_nivel_academico;
    private $nombre;

    function __construct()
    {
        
    }

    function constructor($id_nivel_academico, $nombre) {

        $this->id_nivel_academico = $id_nivel_academico;
        $this->nombre = $nombre;

    }

    
    function getId_nivel_academico() {
        return $this->id_nivel_academico;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId_nivel_academico($id_nivel_academico) {
        $this->id_nivel_academico = $id_nivel_academico;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}