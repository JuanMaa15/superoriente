<?php


class CargoDTO {

    private $id_cargo;
    private $nombre;
    private $seccion;
    private $area;
       
        public function __construct()
        {
            
        }

       public function constructor($id_cargo, $nombre, $seccion, $area) {
           $this->id_cargo = $id_cargo;
           $this->nombre = $nombre;
           $this->seccion = $seccion;
           $this->area = $area;
           
       }
       
       function getId_cargo() {
           return $this->id_cargo;
       }


       function getNombre() {
        return $this->nombre;
        }

        function getSeccion() {
            return $this->seccion;
        }

        function getArea() {
            return $this->area;
        }

       function setId_cargo($id_cargo) {
           $this->id_cargo = $id_cargo;
       }

       function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setSeccion($seccion) {
            $this->seccion = $seccion;
        }

        function setArea($area) {
            $this->area = $area;
        }

    



    
}

