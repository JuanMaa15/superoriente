<?php


class AreaDTO {

    private $id_area;
    private $nombre;
       
        public function __construct()
        {
            
        }

       public function constructor($id_area, $nombre) {
           $this->id_area = $id_area;
           $this->nombre = $nombre;
           
       }
       
       function getId_area() {
           return $this->id_area;
       }


       function getNombre() {
        return $this->nombre;
        }

       function setId_area($id_area) {
           $this->id_area = $id_area;
       }

       function setNombre($nombre) {
        $this->nombre = $nombre;
        }

    



    
}

