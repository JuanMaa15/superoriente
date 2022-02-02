<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/TipoContratoDTO.php");

class TipoContratoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de tipos de contratos ------------------------------------

    public function listaTiposContratos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_tipo_contrato";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new TipoContratoDTO();
                $lista[$i]->constructor(
                    $row['id_tipo_contrato'],
                    $row['tipo_contrato']
                );
                $i += 1; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los tipos de contratos";
        }

        return null;

    }

    //------------------- Registrar un tipo de contrato ----------------

    public function registrarTipoContrato($tipoContratodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_tipo_contrato(tipo_contrato) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $tipo_contrato = $tipoContratodto->getNombre();

            $ps->bindParam(1, $tipo_contrato);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un tipo de contrato " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un tipo de contrato -----------------------------

    public function listaTipoContrato($id_tipo_contrato) {

        $cnx = Conexion::conectar();
        $tipoContratodto = null;

        try {
            $sql = "SELECT * FROM tbl_tipo_contrato WHERE id_tipo_contrato = " . $id_tipo_contrato;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $tipoContratodto = new TipoContratoDTO();
            $tipoContratodto->constructor(
                $row['id_tipo_contrato'],
                $row['tipo_contrato']
            );

             
            return $tipoContratodto;

        } catch (Exception $e) {
            print "Error al traer los datos del tipo de contrato" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actulizar tipo de contrato ----------------

    public function actualizarTipoContrato($tipoContratodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_tipo_contrato SET tipo_contrato = ? WHERE id_tipo_contrato = " . $tipoContratodto->getId_tipo_contrato();
            $ps = $cnx->prepare($sql);

            $tipo_contrato = $tipoContratodto->getNombre();

            $ps->bindParam(1, $tipo_contrato);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un tipo de contrato" . $ex->getMessage();
        }

        return false;

    }

}