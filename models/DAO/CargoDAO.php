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
            $sql = "SELECT * FROM tbl_cargo AS tc INNER JOIN tbl_seccion AS ts ON tc.id_seccion = ts.id_seccion INNER JOIN tbl_area AS ta ON tc.id_area = ta.id_area";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new CargoDTO();
                $lista[$i]->constructor(
                    $row['id_cargo'],
                    $row['cargo'],
                    $row['seccion'],
                    $row['area']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los cargos" . $e->getMessage();
        }

        return null;

    }

    // ----------------------- Lista de cargos ------------------------------------

    public function listaCargosId() {

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
                    $row['cargo'],
                    $row['id_seccion'],
                    $row['id_area']
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
            $sql = "INSERT INTO tbl_cargo(cargo, id_seccion, id_area) VALUES (?,?,?)";
            $ps = $cnx->prepare($sql);

            $cargo = $cargodto->getNombre();
            $seccion = $cargodto->getSeccion();
            $area = $cargodto->getArea();

            $ps->bindParam(1, $cargo);
            $ps->bindParam(2, $seccion);
            $ps->bindParam(3, $area);

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
                $row['cargo'],
                $row['id_seccion'],
                $row['id_area']
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
            $sql = "UPDATE tbl_cargo SET cargo = ?, id_seccion = ?, id_area = ? WHERE id_cargo = " . $cargodto->getId_cargo();
            $ps = $cnx->prepare($sql);

            $cargo = $cargodto->getNombre();
            $seccion = $cargodto->getSeccion();
            $area = $cargodto->getArea();

            $ps->bindParam(1, $cargo);
            $ps->bindParam(2, $seccion);
            $ps->bindParam(3, $area);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un cargo" . $ex->getMessage();
        }

        return false;

    }

}