<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/SeccionDTO.php");

class SeccionDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de secciones ------------------------------------

    public function listaSecciones() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_seccion ORDER BY seccion";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new SeccionDTO();
                $lista[$i]->constructor(
                    $row['id_seccion'],
                    $row['seccion']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las secciones" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar seccion ----------------

    public function registrarSeccion($secciondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_seccion(seccion) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $seccion = $secciondto->getNombre();

            $ps->bindParam(1, $seccion);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar una seccion " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de una sección -----------------------------

    public function listaSeccion($id_seccion) {

        $cnx = Conexion::conectar();
        $secciondto = null;

        try {
            $sql = "SELECT * FROM tbl_seccion WHERE id_seccion = " . $id_seccion;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $secciondto = new SeccionDTO();
            $secciondto->constructor(
                $row['id_seccion'],
                $row['seccion']
            );

             
            return $secciondto;

        } catch (Exception $e) {
            print "Error al traer los datos de la sección" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actulizar sección ----------------

    public function actualizarSeccion($secciondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_seccion SET seccion = ? WHERE id_seccion = " . $secciondto->getId_seccion();
            $ps = $cnx->prepare($sql);

            $seccion = $secciondto->getNombre();

            $ps->bindParam(1, $seccion);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar una seccion" . $ex->getMessage();
        }

        return false;

    }

}