<?php


class PerfilDTO {

    private $id_perfil;
    private $perfil;
       
        public function __construct()
        {
            
        }

       public function constructor($id_perfil, $perfil) {
           $this->id_perfil = $id_perfil;
           $this->perfil = $perfil;
           
       }
       
       function getId_perfil() {
           return $this->id_perfil;
       }


       function getPerfil() {
        return $this->perfil;
        }

       function setId_perfil($id_perfil) {
           $this->id_perfil = $id_perfil;
       }

       function setPerfil($perfil) {
        $this->perfil = $perfil;
        }

    



    
}

