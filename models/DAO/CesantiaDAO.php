<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/CesantiaDTO.php");

class CesantiaDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de cesantias ------------------------------------

    public function listaCesantias() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_cesantia";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new CesantiaDTO();
                $lista[$i]->constructor(
                    $row['id_cesantia'],
                    $row['cesantia']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las cesantias" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar cesantía ----------------

    public function registrarCesantia($cesantiadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_cesantia(cesantia) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $cesantia = $cesantiadto->getNombre();

            $ps->bindParam(1, $cesantia);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar una cesantia " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de una cesantía -----------------------------

    public function listaCesantia($id_cesantia) {

        $cnx = Conexion::conectar();
        $cesantiadto = null;

        try {
            $sql = "SELECT * FROM tbl_cesantia WHERE id_cesantia = " . $id_cesantia;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $cesantiadto = new CesantiaDTO();
            $cesantiadto->constructor(
                $row['id_cesantia'],
                $row['cesantia']
            );

             
            return $cesantiadto;

        } catch (Exception $e) {
            print "Error al traer los datos de la cesantia" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actulizar cesantía ---------------------

    public function actualizarCesantia($cesantiadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_cesantia SET cesantia = ? WHERE id_cesantia = " . $cesantiadto->getId_cesantia();
            $ps = $cnx->prepare($sql);

            $cesantia = $cesantiadto->getNombre();

            $ps->bindParam(1, $cesantia);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar una cesantia" . $ex->getMessage();
        }

        return false;

    }

}