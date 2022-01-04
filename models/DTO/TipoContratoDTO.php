<?php

class TipoContratoDTO{

    private $id_tipo_contrato;
    private $nombre;

    public function __construct()
        {
            
        }

        public function constructor($id_tipo_contrato, $nombre) {
            $this->id_tipo_contrato = $id_tipo_contrato;
            $this->nombre = $nombre;
            
        }
        
        function getId_tipo_contrato() {
            return $this->id_tipo_contrato;
        }
 
 
        function getNombre() {
         return $this->nombre;
         }
 
        function setId_tipo_contrato($id_tipo_contrato) {
            $this->id_tipo_contrato = $id_tipo_contrato;
        }
 
        function setNombre($nombre) {
         $this->nombre = $nombre;
         
        }
}