<?php 

class HistorialDotacionDTO {

    private $id_historial_contrato;
    private $usuario;
    private $tipo_dotacion;
    private $camisa;
    private $pantalon;
    private $zapato;
    private $vestimenta;
    private $fecha;
    
    function __construct() {
        
    }
    
    function constructor($id_historial_contrato, $usuario, $tipo_dotacion, $camisa, $pantalon, $zapato, $vestimenta, $fecha) {
        $this->id_historial_contrato = $id_historial_contrato;
        $this->usuario = $usuario;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->camisa = $camisa;
        $this->pantalon = $pantalon;
        $this->zapato = $zapato;
        $this->vestimenta = $vestimenta;
        $this->fecha = $fecha;
    }

    function getId_historial_contrato() {
        return $this->id_historial_contrato;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getTipo_dotacion() {
        return $this->tipo_dotacion;
    }

    function getCamisa() {
        return $this->camisa;
    }

    function getPantalon() {
        return $this->pantalon;
    }

    function getZapato() {
        return $this->zapato;
    }

    function getVestimenta() {
        return $this->vestimenta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId_historial_contrato($id_historial_contrato) {
        $this->id_historial_contrato = $id_historial_contrato;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setTipo_dotacion($tipo_dotacion) {
        $this->tipo_dotacion = $tipo_dotacion;
    }

    function setCamisa($camisa) {
        $this->camisa = $camisa;
    }

    function setPantalon($pantalon) {
        $this->pantalon = $pantalon;
    }

    function setZapato($zapato) {
        $this->zapato = $zapato;
    }

    function setVestimenta($vestimenta) {
        $this->vestimenta = $vestimenta;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}

?>