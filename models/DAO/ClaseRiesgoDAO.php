<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/ClaseRiesgoDTO.php");

class ClaseRiesgoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de cesantias ------------------------------------

    public function listaClasesRiesgos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_clase_riesgo";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new ClaseRiesgoDTO();
                $lista[$i]->constructor(
                    $row['id_clase_riesgo'],
                    $row['clase_riesgo'],
                    $row['porcentaje']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las clases de riesgo" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar clase de riesgo ----------------

    public function registrarClaseRiesgo($claseRiesgodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_clase_riesgo(clase_riesgo, porcentaje) VALUES (?,?)";
            $ps = $cnx->prepare($sql);

            $clase_riesgo = $claseRiesgodto->getNombre();
            $porcentaje = $claseRiesgodto->getPorcentaje();

            $ps->bindParam(1, $clase_riesgo);
            $ps->bindParam(2, $porcentaje);
            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar una clase de riesgo " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de una clase de riesgo -----------------------------

     public function listaClaseRiesgo($id_cesantia) {

        $cnx = Conexion::conectar();
        $claseRiesgodto = null;

        try {
            $sql = "SELECT * FROM tbl_clase_riesgo WHERE id_clase_riesgo = " . $id_cesantia;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $claseRiesgodto = new ClaseRiesgoDTO();
            $claseRiesgodto->constructor(
                $row['id_clase_riesgo'],
                $row['clase_riesgo'],
                $row['porcentaje']
            );

             
            return $claseRiesgodto;

        } catch (Exception $e) {
            print "Error al traer los datos de la clase de riesgo" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actulizar cesantía ---------------------

    public function actualizarClaseRiesgo($cesantiadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_clase_riesgo SET clase_riesgo = ?, porcentaje = ? WHERE id_clase_riesgo = " . $cesantiadto->getId_clase_riesgo();
            $ps = $cnx->prepare($sql);

            $clase_riesgo = $cesantiadto->getNombre();
            $porcentaje = $cesantiadto->getPorcentaje();

            $ps->bindParam(1, $clase_riesgo);
            $ps->bindParam(2, $porcentaje);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar una clase riesgo" . $ex->getMessage();
        }

        return false;

    } 

}