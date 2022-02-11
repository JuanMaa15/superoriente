<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/PensionDTO.php");

class PensionDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de pensiones ------------------------------------

    public function listaPensiones() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_pension";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new PensionDTO();
                $lista[$i]->constructor(
                    $row['id_pension'],
                    $row['pension']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las pensiones" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar Pensión ----------------

    public function registrarPension($pensiondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_pension(pension) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $pension = $pensiondto->getNombre();

            $ps->bindParam(1, $pension);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar una pensión " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de una pensión -----------------------------

    public function listaPension($id_pension) {

        $cnx = Conexion::conectar();
        $pensiondto = null;

        try {
            $sql = "SELECT * FROM tbl_pension WHERE id_pension = " . $id_pension;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $pensiondto = new PensionDTO();
            $pensiondto->constructor(
                $row['id_pension'],
                $row['pension']
            );

             
            return $pensiondto;

        } catch (Exception $e) {
            print "Error al traer los datos de una pensión" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actualizar pensión ----------------

    public function actualizarPension($pensiondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_pension SET pension = ? WHERE id_pension = " . $pensiondto->getId_pension();
            $ps = $cnx->prepare($sql);

            $pension = $pensiondto->getNombre();

            $ps->bindParam(1, $pension);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar una pension" . $ex->getMessage();
        }

        return false;

    }

}