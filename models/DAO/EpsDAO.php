<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/EpsDTO.php");

class EpsDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de areas ------------------------------------

    public function listaEpss() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_eps";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new EpsDTO();
                $lista[$i]->constructor(
                    $row['id_eps'],
                    $row['eps']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las eps" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar area ----------------

    public function registrarEps($epsdto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_eps(eps) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $eps= $epsdto->getNombre();

            $ps->bindParam(1, $eps);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar una eps " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un area -----------------------------

    public function listaEps($id_eps) {

        $cnx = Conexion::conectar();
        $epsdto = null;

        try {
            $sql = "SELECT * FROM tbl_eps WHERE id_eps = " . $id_eps;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $epsdto = new EpsDTO();
            $epsdto->constructor(
                $row['id_eps'],
                $row['eps']
            );

             
            return $epsdto;

        } catch (Exception $e) {
            print "Error al traer los datos de la eps" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actulizar area ---------------------

    public function actualizarEps($epsdto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_eps SET eps = ? WHERE id_eps = " . $epsdto->getId_eps();
            $ps = $cnx->prepare($sql);

            $eps= $epsdto->getNombre();

            $ps->bindParam(1, $eps);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar una eps" . $ex->getMessage();
        }

        return false;

    }

}