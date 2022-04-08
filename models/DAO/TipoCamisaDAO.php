<?php
require_once('../../models/DTO/TipoCamisaDTO.php');

class TipoCamisaDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ---------------------------------- Lista de los tipos de camisa ------------------


    public function listaTiposCamisas() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_tipo_camisa";
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                $lista[$i] = new TipoCamisaDTO();
                $lista[$i]->constructor(
                    $row['id_tipo_camisa'],
                    $row['tipo_camisa']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los tipos de camisa" . $e->getMessage();
        }

        return null;

    }


    // --------------------------- Registrar Tipo de camisa ----------------

    public function registrarTipoCamisa($tipoCamisadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_tipo_camisa (tipo_camisa) VALUES (?)";
            $ps= $cnx->prepare($sql);

            $tipo_camisa = $tipoCamisadto->getNombre();

            $ps->bindParam(1, $tipo_camisa);

            $ps->execute();

            return true;


        } catch (Exception $e) {
            print "Error al registrar un tipo de camisa " . $e->getMessage();
        }


        return false;

    }


    // ---------------------- Datos del tipo de camisa ---------------------


    public function listaTipoCamisa($id_tipo_camisa) {

        $cnx = Conexion::conectar();
        $tipoCamisadto = null;
        

        try {
            $sql = "SELECT * FROM tbl_tipo_camisa WHERE id_tipo_camisa = " . $id_tipo_camisa;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $tipoCamisadto = new TipoCamisaDTO();
            $tipoCamisadto->constructor(
                $row['id_tipo_camisa'],
                $row['tipo_camisa']
            );
        

            return $tipoCamisadto;

        } catch (Exception $e) {
            print "Error al traer los datos del tipo de camisa" . $e->getMessage();
        }

        return null;

    }


    // --------------------- Actualizar el tipo de camisa ---------------

    public function actualizarTipoCamisa($tipoCamisadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_tipo_camisa SET tipo_camisa = ? WHERE id_tipo_camisa = " . $tipoCamisadto->getId_tipo_camisa();
            $ps= $cnx->prepare($sql);

            $tipo_camisa = $tipoCamisadto->getNombre();

            $ps->bindParam(1, $tipo_camisa);

            $ps->execute();

            return true;


        } catch (Exception $e) {
            print "Error al actualizar un tipo de camisa " . $e->getMessage();
        }


        return false;

    }

}