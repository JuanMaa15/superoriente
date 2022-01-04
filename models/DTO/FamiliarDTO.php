<?php

class FamiliarDTO{

    private $id_familiar;
    private $nombre;
    private $apellido;
    private $edad;
    private $escolaridad;
    private $parentesco;
    private $usuario;
    
    function __construct() {
        
    }

    function constructor($id_familiar, $nombre, $apellido, $edad, $escolaridad, $parentesco, $usuario) {
        $this->id_familiar = $id_familiar;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->escolaridad = $escolaridad;
        $this->parentesco = $parentesco;
        $this->usuario = $usuario;
    }
    
    function getId_familiar() {
        return $this->id_familiar;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEdad() {
        return $this->edad;
    }

    function getEscolaridad() {
        return $this->escolaridad;
    }

    function getParentesco() {
        return $this->parentesco;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setId_familiar($id_familiar) {
        $this->id_familiar = $id_familiar;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setEscolaridad($escolaridad) {
        $this->escolaridad = $escolaridad;
    }

    function setParentesco($parentesco) {
        $this->parentesco = $parentesco;
    }


    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


}
