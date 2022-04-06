<?php

class OtraVestimentaDTO {

    private $id_vestimenta;
    private $nombre;
    private $tipo_dotacion;
    private $talla;
    private $cantidad;
    private $estado;
    
    function __construct() {
        
    }

    
    function constructor($id_vestimenta, $nombre, $tipo_dotacion, $talla, $cantidad,$estado) {
        $this->id_vestimenta = $id_vestimenta;
        $this->nombre = $nombre;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->talla = $talla;
        $this->cantidad = $cantidad;
        $this->estado = $estado;
    }

    function getId_vestimenta() {
        return $this->id_vestimenta;
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

    function setId_vestimenta($id_vestimenta) {
        $this->id_vestimenta = $id_vestimenta;
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