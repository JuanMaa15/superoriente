<?php

class PantalonDTO {

    private $id_pantalon;
    private $nombre;
    private $tipo_dotacion;
    private $talla;
    private $cantidad;
    private $estado;
    
    function __construct() {
        
    }

    
    function constructor($id_pantalon, $nombre, $tipo_dotacion, $talla, $cantidad, $estado) {
        $this->id_pantalon = $id_pantalon;
        $this->nombre = $nombre;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->talla = $talla;
        $this->cantidad = $cantidad;
        $this->estado = $estado;
    }

    function getId_pantalon() {
        return $this->id_pantalon;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTipo_dotacion() {
        return $this->tipo_dotacion;
    }

    function getTalla() {
        return $this->talla;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_pantalon($id_pantalon) {
        $this->id_pantalon = $id_pantalon;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTipo_dotacion($tipo_dotacion) {
        $this->tipo_dotacion = $tipo_dotacion;
    }

    function setTalla($talla) {
        $this->talla = $talla;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}