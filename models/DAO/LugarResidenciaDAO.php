<?php

require_once ('../../config/conexion.php');
require_once ('../../models/DTO/LugarResidenciaDTO.php');

class LugarResidenciaDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */


    // Lista de municipios

    public function ListaLugaresResidencia() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_lugar_residencia";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {
                $lista[$i] = new LugarResidenciaDTO();
                $lista[$i]->constructor(
                    $row['id_lugar_residencia'],
                    $row['lugar_residencia']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $ex) {
            echo "Error al traer la lista de los municipios ". $ex->getMessage();
        }

        return null;

    }

}