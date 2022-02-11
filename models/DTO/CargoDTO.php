<?php


class CargoDTO {

    private $id_cargo;
    private $nombre;
       
        public function __construct()
        {
            
        }

       public function constructor($id_cargo, $nombre) {
           $this->id_cargo = $id_cargo;
           $this->nombre = $nombre;
           
       }
       
       function getId_cargo() {
           return $this->id_cargo;
       }


       function getNombre() {
        return $this->nombre;
        }

       function setId_cargo($id_cargo) {
           $this->id_cargo = $id_cargo;
       }

       function setNombre($nombre) {
        $this->nombre = $nombre;
        }

    



    
}

