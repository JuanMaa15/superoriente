<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/EstadoCivilDTO.php");

class EstadoCivilDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ------------------------------ Listado de estados civiles --------------------------

    public function listaEstadosCiviles() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;
        

        try {
            
            $sql = "SELECT * FROM tbl_estado_civil";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new EstadoCivilDTO();
                $lista[$i]->constructor(
                    $row['id_estado_civil'],
                    $row['estado_civil']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $ex) {
            print "Error al traer la lista de los estados civiles ". $ex->getMessage();
        }

        return null;

    }



    // -------------------------------- Registrar un estado civil --------------------

    public function registrarEstadoCivil($estadoCivildto) {

        $cnx = Conexion::conectar();

        try {
            
            $sql = "INSERT INTO tbl_estado_civil(estado_civil) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $estado_civil = $estadoCivildto->getNombre();

            $ps->bindParam(1, $estado_civil);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al registrar un estado civil";
        }

        return false;

    }

    // --------------------------- Datos de un estado civil -----------------

    public function listaEstadoCivil($id_estado_civil) {

        $cnx = Conexion::conectar();
        $estadoCivildto = null;

        try {
            
            $sql = "SELECT * FROM tbl_estado_civil WHERE id_estado_civil = " . $id_estado_civil;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $estadoCivildto = new EstadoCivilDTO();
            $estadoCivildto->constructor(
                $row['id_estado_civil'],
                $row['estado_civil']
            );

            return $estadoCivildto;

        } catch (Exception $e) {
            print "Error al traer los datos de un estado civil " . $e->getMessage();
        }

        return null;

    }

    // ------------------------------- Actualizar estado civil ---------------------------

     public function actualizarEstadoCivil($estadoCivildto) {

        $cnx = Conexion::conectar();

        try {
            
            $sql = "UPDATE tbl_estado_civil SET estado_civil = ? WHERE id_estado_civil = ". $estadoCivildto->getId_estado_civil();
            $ps = $cnx->prepare($sql);

            $estado_civil = $estadoCivildto->getNombre();

            $ps->bindParam(1, $estado_civil);

            $ps->execute();
            
            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un estado civil";
        }

        return false;

    }
    
}