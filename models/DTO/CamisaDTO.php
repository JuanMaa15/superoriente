<?php

class CamisaDTO {

    private $id_camisa;
    private $nombre;
    private $tipo_dotacion;
    private $talla;
    private $cantidad;
    private $estado;
    private $genero;
    
    function __construct() {
        
    }

    function constructor($id_camisa, $nombre, $tipo_dotacion, $talla, $cantidad, $estado, $genero) {
        $this->id_camisa = $id_camisa;
        $this->nombre = $nombre;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->talla = $talla;
        $this->cantidad = $cantidad;
        $this->estado = $estado;
        $this->genero = $genero;
    }
    
    function getId_camisa() {
        return $this->id_camisa;
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

    function getGenero() {
        return $this->genero;
    }

    function setId_camisa($id_camisa) {
        $this->id_camisa = $id_camisa;
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

    function setGenero($genero) {
        $this->genero = $genero;
    }



}