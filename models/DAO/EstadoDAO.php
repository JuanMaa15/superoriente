<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/EstadoDTO.php");


class EstadoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de estados ------------------------------------

    public function listaEstados() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_estado";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {
                $lista[$i] = new EstadoDTO();
                $lista[$i]->constructor(
                    $row['id_estado'],
                    $row['estado']
                );

                $i += 1;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los estados " . $e->getMessage();
        }

        return null;


    }


}