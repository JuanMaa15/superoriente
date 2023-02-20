<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/HistorialCargoDTO.php");

class HistorialCargoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de cargos ------------------------------------

    public function listaHistorialCargo($id_usuario) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_historial_cargo AS thc INNER JOIN tbl_cargo AS tc ON thc.id_cargo = tc.id_cargo INNER JOIN tbl_seccion AS ts ON tc.id_seccion = ts.id_seccion INNER JOIN tbl_area AS ta ON tc.id_area = ta.id_area WHERE id_usuario = '" . $id_usuario . "'";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new HistorialCargoDTO();
                $lista[$i]->constructor(
                    $row['id_historial_cargo'],
                    $row['id_usuario'],
                    $row['cargo'],
                    $row['seccion'],
                    $row['area'],
                    $row['fecha_inicio'],
                    $row['fecha_fin']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista del historial de cargos" . $e->getMessage();
        }

        return null;

    }

    //------------------- Registrar historial de cargo ----------------

    public function registrarHistorialCargo($historialCargodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_historial_cargo(id_usuario, id_cargo, fecha_inicio, fecha_fin) VALUES (?,?,GETDATE(),'')";
            $ps = $cnx->prepare($sql);

            

            $usuario = $historialCargodto->getUsuario();
            $cargo = $historialCargodto->getCargo();
           

            $ps->bindParam(1, $usuario);
            $ps->bindParam(2, $cargo);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un historial de cargo " . $e->getMessage();
        }

        return false;

    }

    // --------------------------- Actualizar cargo ----------------

    public function actualizarHistorialCargo($id_historial_cargo) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_historial_cargo SET fecha_fin = GETDATE() WHERE id_historial_cargo = $id_historial_cargo";

            $ps = $cnx->prepare($sql);

            $ps->execute();


            return true;


        } catch (Exception $ex) {
            print "Error al actualizar un historial de cargo " . $ex->getMessage();
        }

        return false;

    }

    // Eliminar un registro de historial 

    public function eliminarHistorialCargo($id_historial_cargo) {

        $cnx = Conexion::conectar();

        try {
            $sql = "DELETE FROM tbl_historial_cargo WHERE id_historial_cargo = " . $id_historial_cargo;
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al al eliminar un historial de cargo";
        }


        return false;
    }
}