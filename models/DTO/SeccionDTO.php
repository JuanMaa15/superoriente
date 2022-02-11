<?php


class SeccionDTO {

    private $id_seccion;
    private $nombre;
       
        public function __construct()
        {
            
        }

       public function constructor($id_seccion, $nombre) {
           $this->id_seccion = $id_seccion;
           $this->nombre = $nombre;
           
       }
       
       function getId_seccion() {
           return $this->id_seccion;
       }


       function getNombre() {
        return $this->nombre;
        }

       function setId_seccion($id_seccion) {
           $this->id_seccion = $id_seccion;
       }

       function setNombre($nombre) {
        $this->nombre = $nombre;
        }

    



    
}

