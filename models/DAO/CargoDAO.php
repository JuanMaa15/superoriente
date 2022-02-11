<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/CargoDTO.php");

class CargoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de cargos ------------------------------------

    public function listaCargos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_cargo";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new CargoDTO();
                $lista[$i]->constructor(
                    $row['id_cargo'],
                    $row['cargo']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los cargos" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar cargo ----------------

    public function registrarCargo($cargodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_cargo(cargo) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $cargo = $cargodto->getNombre();

            $ps->bindParam(1, $cargo);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un cargo " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un cargo -----------------------------

    public function listaCargo($id_cargo) {

        $cnx = Conexion::conectar();
        $cargodto = null;

        try {
            $sql = "SELECT * FROM tbl_cargo WHERE id_cargo = " . $id_cargo;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $cargodto = new CargoDTO();
            $cargodto->constructor(
                $row['id_cargo'],
                $row['cargo']
            );

             
            return $cargodto;

        } catch (Exception $e) {
            print "Error al traer los datos del area" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actualizar cargo ----------------

    public function actualizarCargo($cargodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_cargo SET cargo = ? WHERE id_cargo = " . $cargodto->getId_cargo();
            $ps = $cnx->prepare($sql);

            $cargo = $cargodto->getNombre();

            $ps->bindParam(1, $cargo);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un cargo" . $ex->getMessage();
        }

        return false;

    }

}