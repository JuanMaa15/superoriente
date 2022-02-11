<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/AreaDTO.php");

class AreaDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de areas ------------------------------------

    public function listaAreas() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_area";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new AreaDTO();
                $lista[$i]->constructor(
                    $row['id_area'],
                    $row['area']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las areas" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar area ----------------

    public function registrarArea($areadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_area(area) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $area = $areadto->getNombre();

            $ps->bindParam(1, $area);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un area " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un area -----------------------------

    public function listaArea($id_area) {

        $cnx = Conexion::conectar();
        $areadto = null;

        try {
            $sql = "SELECT * FROM tbl_area WHERE id_area = " . $id_area;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $areadto = new AreaDTO();
            $areadto->constructor(
                $row['id_area'],
                $row['area']
            );

             
            return $areadto;

        } catch (Exception $e) {
            print "Error al traer los datos del area" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actulizar area ----------------

    public function actualizarArea($areadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_area SET area = ? WHERE id_area = " . $areadto->getId_area();
            $ps = $cnx->prepare($sql);

            $area = $areadto->getNombre();

            $ps->bindParam(1, $area);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un area" . $ex->getMessage();
        }

        return false;

    }

}