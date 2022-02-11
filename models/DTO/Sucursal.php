<?php


class SucursalDTO {

    private $id_sucursal;
    private $nombre;
       
        public function __construct()
        {
            
        }

       public function constructor($id_sucursal, $nombre) {
           $this->id_sucursal = $id_sucursal;
           $this->nombre = $nombre;
           
       }
       
       function getId_sucursal() {
           return $this->id_sucursal;
       }

       function getNombre() {
        return $this->nombre;
        }

       function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
       }

       function setNombre($nombre) {
        $this->nombre = $nombre;
        }

    
}

