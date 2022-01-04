<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/PerfilDTO.php");


class PerfilDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de perfiles ------------------------------------

    public function listaPerfiles() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_perfil";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {
                $lista[$i] = new PerfilDTO();
                $lista[$i]->constructor(
                    $row['id_perfil'],
                    $row['perfil']
                );

                $i += 1;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los perfiles";
        }

        return null;


    }


}