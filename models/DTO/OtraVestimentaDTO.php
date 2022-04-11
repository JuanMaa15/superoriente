<?php

class OtraVestimentaDTO {

    private $id_vestimenta;
    private $nombre;
    private $tipo_dotacion;
    private $cantidad;
    private $estado;
    
    function __construct() {
        
    }

    
    function constructor($id_vestimenta, $nombre, $tipo_dotacion, $cantidad, $estado) {
        $this->id_vestimenta = $id_vestimenta;
        $this->nombre = $nombre;
        $this->tipo_dotacion = $tipo_dotacion;
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

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}