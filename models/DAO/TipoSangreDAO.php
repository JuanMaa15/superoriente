<?php

use TipoSangreDTO as GlobalTipoSangreDTO;

require_once("../../config/conexion.php");
require_once("../../models/DTO/TipoSangreDTO.php");

class TipoSangreDAO {
    
    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    public function listaTiposSangre() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_tipo_sangre_rh";
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {

                $lista[$i] = new TipoSangreDTO();
                $lista[$i]->constructor(
                    $row['id_tipo_sangre_rh'],
                    $row['tipo_sangre_rh']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $ex) {
            print "Error al traer los datos de los tipos de sangre " . $ex->getMessage();
        }

        return null;

    }

}