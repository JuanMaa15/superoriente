<?php

require_once('../../config/conexion.php');
require_once('../../models/DTO/OtraVestimentaDTO.php');

class OtraVestimentaDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de cargos ------------------------------------

    public function listaVestimentas() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_otra_vestimenta AS tov INNER JOIN tbl_tipo_dotacion AS ttd ON tov.id_tipo_dotacion = ttd.id_tipo_dotacion";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new OtraVestimentaDTO();
                $lista[$i]->constructor(
                    $row['id_vestimenta'],
                    $row['vestimenta'],
                    $row['tipo_dotacion'],
                    $row['talla'],
                    $row['cantidad'],
                    $row['estado']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las vestimentas" . $e->getMessage();
        }

        return null;

    }


    // ----------------------- Lista de vestimenta con ID ------------------------------------

    public function listaVestimentasId() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_otra_vestimenta";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new OtraVestimentaDTO();
                $lista[$i]->constructor(
                    $row['id_vestimenta'],
                    $row['vestimenta'],
                    $row['id_tipo_dotacion'],
                    $row['talla'],
                    $row['cantidad'],
                    $row['estado']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las vestimentas" . $e->getMessage();
        }

        return null;

    }


    //------------------- Registrar cargo ----------------

    public function registrarVestimenta($otraVestimentadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_otra_vestimenta(vestimenta, id_tipo_dotacion, talla, cantidad, estado) VALUES (?,?,?,?,?)";
            $ps = $cnx->prepare($sql);

            $vestimenta = $otraVestimentadto->getNombre();
            $tipo_dotacion = $otraVestimentadto->getTipo_dotacion();
            $talla = $otraVestimentadto->getTalla();
            $cantidad = $otraVestimentadto->getCantidad();
            $estado = $otraVestimentadto->getEstado();

            $ps->bindParam(1, $vestimenta);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $talla);
            $ps->bindParam(4, $cantidad);
            $ps->bindParam(5, $estado);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar una vestimenta " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un cargo -----------------------------

    public function listaVestimenta($id_vestimenta) {

        $cnx = Conexion::conectar();
        $otraVestimentadto = null;

        try {
            $sql = "SELECT * FROM tbl_otra_vestimenta WHERE id_vestimenta = " . $id_vestimenta;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $otraVestimentadto = new OtraVestimentaDTO();
            $otraVestimentadto->constructor(
                $row['id_vestimenta'],
                $row['vestimenta'],
                $row['id_tipo_dotacion'],
                $row['talla'],
                $row['cantidad'],
                $row['estado']
            );

             
            return $otraVestimentadto;

        } catch (Exception $e) {
            print "Error al traer los datos de la vestimenta" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actualizar cargo ----------------

    public function actualizarVestimenta($otraVestimentadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_otra_vestimenta SET vestimenta = ?, id_tipo_dotacion = ?, talla = ?, cantidad = ?, estado = ? WHERE id_vestimenta = " . $otraVestimentadto->getId_vestimenta();
            $ps = $cnx->prepare($sql);

            $vestimenta = $otraVestimentadto->getNombre();
            $tipo_dotacion = $otraVestimentadto->getTipo_dotacion();
            $talla = $otraVestimentadto->getTalla();
            $cantidad = $otraVestimentadto->getCantidad();
            $estado = $otraVestimentadto->getEstado();

            $ps->bindParam(1, $vestimenta);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $talla);
            $ps->bindParam(4, $cantidad);
            $ps->bindParam(5, $estado);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar una vestimenta" . $ex->getMessage();
        }

        return false;

    }

    // --------------------------- Actualizar cantidad de vestimentas restantes ----------------


    public function actualizarCantidadVestimenta($vestimentadto) {
        $cnx = Conexion::conectar();

        try {
            if ($vestimentadto->getCantidad() <= 0) {
                $sql = "UPDATE tbl_otra_vestimenta SET cantidad = ?, estado = 0 WHERE id_vestimenta = ". $vestimentadto->getId_vestimenta();
            }else{
                $sql = "UPDATE tbl_otra_vestimenta SET cantidad = ? WHERE id_vestimenta = ". $vestimentadto->getId_vestimenta();

            }
            $ps = $cnx->prepare($sql);

            $cantidad = $vestimentadto->getCantidad();

            $ps->bindParam(1, $cantidad);

            $ps->execute();

            return true;
        } catch (Exception $e) {
            echo "Error al actualizar la cantidad de las vestimentas " . $e->getMessage();
        }
    }


}