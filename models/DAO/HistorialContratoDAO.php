<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/HistorialContratoDTO.php");

class HistorialContratoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de niveles academicos ------------------------------------

    public function listaHistorialContratos($id_usuario) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_historial_contrato AS thc INNER JOIN tbl_tipo_contrato AS ttc ON thc.id_tipo_contrato = ttc.id_tipo_contrato WHERE id_usuario = '" . $id_usuario . "'";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new HistorialContratoDTO();
                $lista[$i]->constructor(
                    $row['id_historial_contrato'],
                    $row['id_usuario'],
                    $row['tipo_contrato'],
                    $row['fecha_inicio'],
                    $row['fecha_fin']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista del historial de contratos" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar nivel academico ----------------

    public function registrarHistorialContrato($historialContratodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_historial_contrato(id_usuario, id_tipo_contrato, fecha_inicio, fecha_fin) VALUES (?,?,?,?)";
            $ps = $cnx->prepare($sql);

            $usuario = $historialContratodto->getUsuario();
            $tipo_contrato = $historialContratodto->getTipo_contrato();
            $fecha_inicio = $historialContratodto->getFecha_inicio();
            $fecha_fin = $historialContratodto->getFecha_fin();

            $ps->bindParam(1, $usuario);
            $ps->bindParam(2, $tipo_contrato);
            $ps->bindParam(3, $fecha_inicio);
            $ps->bindParam(4, $fecha_fin);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un historial de contrato " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un nivel academico -----------------------------

   /*  public function listaNivelAcademico($id_nivel_academico) {

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

    } */

    // --------------------------- Actulizar nivel academico ----------------

    public function actualizarHistorialContrato($id_historial_contrato) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_historial_contrato SET fecha_fin = GETDATE() WHERE id_historial_contrato = " . $id_historial_contrato;
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;


        } catch (Exception $ex) {
            print "Error al actualizar un historial de contrato" . $ex->getMessage();
        }

        return false;

    }

    // Eliminar un registro de historial 

    public function eliminarHistorialContrato($id_historial_contrato) {

        $cnx = Conexion::conectar();

        try {
            $sql = "DELETE FROM tbl_historial_contrato WHERE id_historial_contrato = " . $id_historial_contrato;
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al al eliminar un historial de contrato";
        }


        return false;
    }

}