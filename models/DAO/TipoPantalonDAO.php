<?php
require_once("../../config/conexion.php");
require_once('../../models/DTO/TipoPantalonDTO.php');

class TipoPantalonDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ---------------------------------- Lista de los tipos de pantalón ------------------


    public function listaTiposPantalones() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_tipo_pantalon";
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                $lista[$i] = new TipoPantalonDTO();
                $lista[$i]->constructor(
                    $row['id_tipo_pantalon'],
                    $row['tipo_pantalon']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los tipos de pantalones" . $e->getMessage();
        }

        return null;

    }


    // --------------------------- Registrar Tipo de camisa ----------------

    public function registrarTipoPantalon($tipoPantalondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_tipo_pantalon (tipo_pantalon) VALUES (?)";
            $ps= $cnx->prepare($sql);

            $tipo_pantalon = $tipoPantalondto->getNombre();

            $ps->bindParam(1, $tipo_pantalon);

            $ps->execute();

            return true;


        } catch (Exception $e) {
            print "Error al registrar un tipo de pantalon " . $e->getMessage();
        }


        return false;

    }


    // ---------------------- Datos del tipo de camisa ---------------------


    public function listaTipoPantalon($id_tipo_pantalon) {

        $cnx = Conexion::conectar();
        $tipoPantalondto = null;
        

        try {
            $sql = "SELECT * FROM tbl_tipo_pantalon WHERE id_tipo_pantalon = " . $id_tipo_pantalon;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $tipoPantalondto = new TipoPantalonDTO();
            $tipoPantalondto->constructor(
                $row['id_tipo_pantalon'],
                $row['tipo_pantalon']
            );
        

            return $tipoPantalondto;

        } catch (Exception $e) {
            print "Error al traer los datos del tipo de pantalón" . $e->getMessage();
        }

        return null;

    }


    // --------------------- Actualizar el tipo de camisa ---------------

    public function actualizarTipoPantalon($tipoPantalondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_tipo_pantalon SET tipo_pantalon = ? WHERE id_tipo_pantalon = " . $tipoPantalondto->getId_tipo_pantalon();
            $ps= $cnx->prepare($sql);

            $tipo_pantalon = $tipoPantalondto->getNombre();

            $ps->bindParam(1, $tipo_pantalon);

            $ps->execute();

            return true;


        } catch (Exception $e) {
            print "Error al actualizar un tipo de pantalón " . $e->getMessage();
        }


        return false;

    }

}