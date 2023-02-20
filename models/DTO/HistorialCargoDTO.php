<?php

class HistorialCargoDTO {

    private $id_historial_cargo;
    private $usuario;
    private $cargo;
    private $seccion;
    private $area;
    private $fecha_inicio;
    private $fecha_fin;
    
    function __construct() {
        
    }

    
    function constructor($id_historial_cargo, $usuario, $cargo, $seccion, $area, $fecha_inicio, $fecha_fin) {
        $this->id_historial_cargo = $id_historial_cargo;
        $this->usuario = $usuario;
        $this->cargo = $cargo;
        $this->seccion = $seccion;
        $this->area = $area;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }


    function getId_historial_cargo() {
        return $this->id_historial_cargo;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getSeccion() {
        return $this->seccion;
    }

    function getArea() {
        return $this->area;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    function getFecha_fin() {
        return $this->fecha_fin;
    }

    function setId_historial_cargo($id_historial_cargo) {
        $this->id_historial_cargo = $id_historial_cargo;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setSeccion($seccion) {
        $this->seccion = $seccion;
    }

    function setArea($area) {
        $this->area = $area;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }




}