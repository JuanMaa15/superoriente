<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/SucursalDTO.php");

class SucursalDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de sucursales ------------------------------------

    public function listaSucursales() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_sucursal";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new SucursalDTO();
                $lista[$i]->constructor(
                    $row['id_sucursal'],
                    $row['sucursal']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las sucursales" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar cargo ----------------

    public function registrarSucursal($sucursaldto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_sucursal(sucursal) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $sucursal = $sucursaldto->getNombre();

            $ps->bindParam(1, $sucursal);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar una sucursal " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de una sucursal -----------------------------

    public function listaSucursal($id_sucursal) {

        $cnx = Conexion::conectar();
        $sucursaldto = null;

        try {
            $sql = "SELECT * FROM tbl_sucursal WHERE id_sucursal = " . $id_sucursal;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $sucursaldto = new SucursalDTO();
            $sucursaldto->constructor(
                $row['id_sucursal'],
                $row['sucursal']
            );

             
            return $sucursaldto;

        } catch (Exception $e) {
            print "Error al traer los datos de al sucursal" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actualizar sucursal ----------------

    public function actualizarSucursal($sucursaldto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_sucursal SET sucursal = ? WHERE id_sucursal = " . $sucursaldto->getId_sucursal();
            $ps = $cnx->prepare($sql);

            $sucursal = $sucursaldto->getNombre();

            $ps->bindParam(1, $sucursal);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar una sucursal" . $ex->getMessage();
        }

        return false;

    }

}