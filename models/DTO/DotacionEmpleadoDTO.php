<?php


class DotacionEmpleadoDTO {

    private $id_dotacion_empleado;
    private $usuario;
    private $tipo_dotacion;
    private $fecha;
    
    function __construct() {
        
    }

    
    function constructor($id_dotacion_empleado, $usuario, $tipo_dotacion, $fecha) {
        $this->id_dotacion_empleado = $id_dotacion_empleado;
        $this->usuario = $usuario;
        $this->tipo_dotacion = $tipo_dotacion;
        $this->fecha = $fecha;
    }

        function getId_dotacion_empleado() {
        return $this->id_dotacion_empleado;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getTipo_dotacion() {
        return $this->tipo_dotacion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId_dotacion_empleado($id_dotacion_empleado) {
        $this->id_dotacion_empleado = $id_dotacion_empleado;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setTipo_dotacion($tipo_dotacion) {
        $this->tipo_dotacion = $tipo_dotacion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}