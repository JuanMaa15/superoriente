<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/CasaDTO.php");

class CasaDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    public function listaCasas() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_casa";
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {

                $lista[$i] = new CasaDTO();
                $lista[$i]->constructor(
                    $row['id_casa'],
                    $row['tipo_casa']
                );

                $i++;

            }

            return $lista;

        } catch (Exception $ex) {
            print "Error al traer los datos de los tipos de casas" . $ex->getMessage();
        }

        return  null;

    }

}

?>