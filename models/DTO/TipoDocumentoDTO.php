<?php

class TipoDocumentoDTO{

    private $id_tipo_documento;
    private $tipo_documento;

    public function __construct()
        {
            
        }

        public function constructor($id_tipo_documento, $tipo_documento) {
            $this->id_tipo_documento = $id_tipo_documento;
            $this->tipo_documento = $tipo_documento;
            
        }
        
        function getId_tipo_documento() {
            return $this->id_tipo_documento;
        }
 
 
        function getTipo_documento() {
         return $this->tipo_documento;
         }
 
        function setId_tipo_documento($id_tipo_documento) {
            $this->id_tipo_documento = $id_tipo_documento;
        }
 
        function setTipo_documento($tipo_documento) {
         $this->tipo_documento = $tipo_documento;
         
        }
}