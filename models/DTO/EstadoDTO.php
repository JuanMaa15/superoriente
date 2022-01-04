<?php

class EstadoDTO{

    private $id_estado;
    private $nombre;

    public function __construct()
        {
            
        }

        public function constructor($id_estado, $nombre) {
            $this->id_estado = $id_estado;
            $this->nombre = $nombre;
            
        }
        
        function getId_estado() {
            return $this->id_estado;
        }
 
        function getNombre() {
         return $this->nombre;
         }
 
        function setId_estado($id_estado) {
            $this->id_estado = $id_estado;
        }
 
        function setNombre($nombre) {
         $this->nombre = $nombre;
         
        }
}