<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/TipoContratoDTO.php");

class TipoContratoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de tipos de contratos ------------------------------------

    public function listaTiposContratos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_tipo_contrato";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new TipoContratoDTO();
                $lista[$i]->constructor(
                    $row['id_tipo_contrato'],
                    $row['tipo_contrato']
                );
                $i += 1; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los tipos de contratos";
        }

        return null;

    }

}