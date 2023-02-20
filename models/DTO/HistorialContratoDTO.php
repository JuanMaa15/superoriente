<?php 

    class HistorialContratoDTO {

        private $id_historial_contrato;
        private $usuario;
        private $tipo_contrato;
        private $fecha_inicio;
        private $fecha_fin;
        
        function __construct() {
            
        }

        function constructor($id_historial_contrato, $usuario, $tipo_contrato, $fecha_inicio, $fecha_fin) {
            $this->id_historial_contrato = $id_historial_contrato;
            $this->usuario = $usuario;
            $this->tipo_contrato = $tipo_contrato;
            $this->fecha_inicio = $fecha_inicio;
            $this->fecha_fin = $fecha_fin;
        }

        function getId_historial_contrato() {
            return $this->id_historial_contrato;
        }

        function getUsuario() {
            return $this->usuario;
        }

        function getTipo_contrato() {
            return $this->tipo_contrato;
        }

        function getFecha_inicio() {
            return $this->fecha_inicio;
        }

        function getFecha_fin() {
            return $this->fecha_fin;
        }

        function setId_historial_contrato($id_historial_contrato) {
            $this->id_historial_contrato = $id_historial_contrato;
        }

        function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        function setTipo_contrato($tipo_contrato) {
            $this->tipo_contrato = $tipo_contrato;
        }

        function setFecha_inicio($fecha_inicio) {
            $this->fecha_inicio = $fecha_inicio;
        }

        function setFecha_fin($fecha_fin) {
            $this->fecha_fin = $fecha_fin;
        }

    }

?>