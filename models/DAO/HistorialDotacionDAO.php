<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/HistorialDotacionDTO.php");

class HistorialDotacionDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de niveles academicos ------------------------------------

    public function listaHistorialDotaciones($id_usuario) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_historial_dotacion AS thc INNER JOIN tbl_tipo_dotacion AS ttd ON thc.id_tipo_dotacion = ttd.id_tipo_dotacion WHERE id_usuario = '" . $id_usuario . "'";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new HistorialDotacionDTO();
                $lista[$i]->constructor(
                    $row['id_historial_dotacion'],
                    $row['id_usuario'],
                    $row['tipo_dotacion'],
                    $row['camisa'],
                    $row['pantalon'],
                    $row['zapato'],
                    $row['vestimenta'],
                    $row['fecha']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista del historial de dotaciones" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar nivel academico ----------------

    public function registrarHistorialDotacion($historialDotaciondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_historial_dotacion(id_usuario, id_tipo_dotacion, camisa, pantalon, zapato, vestimenta, fecha) VALUES (?,?,?,?,?,?,?)";
            $ps = $cnx->prepare($sql);

            $usuario = $historialDotaciondto->getUsuario();
            $tipo_dotacion = $historialDotaciondto->getTipo_dotacion();
            $camisa = $historialDotaciondto->getCamisa();
            $pantalon = $historialDotaciondto->getPantalon();
            $zapato = $historialDotaciondto->getZapato();
            $vestimenta = $historialDotaciondto->getVestimenta();
            $fecha = $historialDotaciondto->getFecha();

            $ps->bindParam(1, $usuario);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $camisa);
            $ps->bindParam(4, $pantalon);
            $ps->bindParam(5, $zapato);
            $ps->bindParam(6, $vestimenta);
            $ps->bindParam(7, $fecha);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un historial de dotacion
             " . $e->getMessage();
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

    public function actualizarHistorialContrato($historialContratodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_historial_contrato SET id_usuario, id_tipo_contrato, fecha_inicio, fecha_fin = ? WHERE id_historial_contrato = " . $historialContratodto->getId_historial_contrato();
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