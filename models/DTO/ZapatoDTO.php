<?php

class ZapatoDTO {
    
    private $id_zapato;
    private $nombre;
    private $tipo_dotacion;
    private $talla;
    private $cantidad;
    private $estado;
   
    function __construct() {
        
    }

        function constructor($id_zapato, $nombre, $tipo_dotacion, $talla, $cantidad, $estado) {
        $this->id_zapato = $id_zapato;
        $this->nombre = $nombre;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->talla = $talla;
        $this->cantidad = $cantidad;
        $this->estado = $estado;
    }

    function getId_zapato() {
        return $this->id_zapato;
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

    function setId_zapato($id_zapato) {
        $this->id_zapato = $id_zapato;
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