<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/TipoDotacionDTO.php");

class TipoDotacionDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de dotaciones ------------------------------------

    public function listaTiposDotaciones() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_tipo_dotacion";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new TipoDotacionDTO();
                $lista[$i]->constructor(
                    $row['id_tipo_dotacion'],
                    $row['tipo_dotacion']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los tipos de dotaciones" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar tipo de dotación ----------------

    public function registrarTipoDotacion($tipoDotaciondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_tipo_dotacion(tipo_dotacion) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $tipo_dotacion = $tipoDotaciondto->getNombre();

            $ps->bindParam(1, $tipo_dotacion);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un tipo de dotación " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un tipo de dotación -----------------------------

    public function listaTipoDotacion($id_tipo_dotacion) {

        $cnx = Conexion::conectar();
        $tipoDotaciondto = null;

        try {
            $sql = "SELECT * FROM tbl_tipo_dotacion WHERE id_tipo_dotacion = " . $id_tipo_dotacion;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $tipoDotaciondto = new TipoDotacionDTO();
            $tipoDotaciondto->constructor(
                $row['id_tipo_dotacion'],
                $row['tipo_dotacion']
            );

             
            return $tipoDotaciondto;

        } catch (Exception $e) {
            print "Error al traer los datos del tipo de dotación" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actulizar tipo de dotacion ----------------

    public function actualizarTipoDotacion($tipoDotaciondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_tipo_dotacion SET tipo_dotacion = ? WHERE id_tipo_dotacion = " . $tipoDotaciondto->getId_tipo_dotacion();
            $ps = $cnx->prepare($sql);

            $tipo_dotacion= $tipoDotaciondto->getNombre();

            $ps->bindParam(1, $tipo_dotacion);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un tipo de dotación" . $ex->getMessage();
        }

        return false;

    }

}