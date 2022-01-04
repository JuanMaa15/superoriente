<?php

class HijoDTO {

    
    private $id_hijo;
    private $nombre;
    private $apellido;
    private $edad;
    private $fecha_nacimiento;
    private $usuario;

    function __construct() {
        
    }

    
    function constructor($id_hijo, $nombre, $apellido, $edad, $fecha_nacimiento, $usuario) {
        $this->id_hijo = $id_hijo;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->usuario = $usuario;
    }

    function getId_hijo() {
        return $this->id_hijo;
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

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setId_hijo($id_hijo) {
        $this->id_hijo = $id_hijo;
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

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }



}
