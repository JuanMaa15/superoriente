<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/NivelAcademicoDTO.php");

class NivelAcademicoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de niveles academicos ------------------------------------

    public function listaNivelesAcademicos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_nivel_academico";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new NivelAcademicoDTO();
                $lista[$i]->constructor(
                    $row['id_nivel_academico'],
                    $row['nivel_academico']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los niveles academicos" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar nivel academico ----------------

    public function registrarNivelAcademico($nivelAcedemicodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_nivel_academico(nivel_academico ) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $nivel_academico = $nivelAcedemicodto->getNombre();

            $ps->bindParam(1, $nivel_academico);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un nivel academico " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un nivel academico -----------------------------

    public function listaNivelAcademico($id_nivel_academico) {

        $cnx = Conexion::conectar();
        $nivelAcademicodto = null;

        try {
            $sql = "SELECT * FROM tbl_nivel_academico WHERE id_nivel_academico = " . $id_nivel_academico;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $nivelAcademicodto = new NivelAcademicoDTO();
            $nivelAcademicodto->constructor(
                $row['id_nivel_academico'],
                $row['nivel_academico']
            );

             
            return $nivelAcademicodto;

        } catch (Exception $e) {
            print "Error al traer los datos del nivel academico" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actulizar nivel academico ----------------

    public function actualizarNivelAcademico($nivelAcademicodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_nivel_academico SET nivel_academico = ? WHERE id_nivel_academico = " . $nivelAcademicodto->getId_nivel_academico();
            $ps = $cnx->prepare($sql);

            $nivel_academico = $nivelAcademicodto->getNombre();

            $ps->bindParam(1, $nivel_academico);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un nivel academico" . $ex->getMessage();
        }

        return false;

    }

}