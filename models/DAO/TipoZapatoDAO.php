<?php
require_once('../../models/DTO/TipoZapatoDTO.php');

class TipoZapatoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ---------------------------------- Lista de los tipos de zapatos ------------------


    public function listaTiposZapatos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_tipo_zapato";
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {
                $lista[$i] = new TipoZapatoDTO();
                $lista[$i]->constructor(
                    $row['id_tipo_zapato'],
                    $row['tipo_zapato']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los tipos de zapatos" . $e->getMessage();
        }

        return null;

    }


    // --------------------------- Registrar Tipo de camisa ----------------

    public function registrarTipoZapato($tipoZapatodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_tipo_zapato (tipo_zapato) VALUES (?)";
            $ps= $cnx->prepare($sql);

            $tipo_zapato = $tipoZapatodto->getNombre();

            $ps->bindParam(1, $tipo_zapato);

            $ps->execute();

            return true;


        } catch (Exception $e) {
            print "Error al registrar un tipo de zapatos " . $e->getMessage();
        }


        return false;

    }


    // ---------------------- Datos del tipo de camisa ---------------------


    public function listaTipoZapato($id_tipo_zapato) {

        $cnx = Conexion::conectar();
        $tipoZapatodto = null;
        

        try {
            $sql = "SELECT * FROM tbl_tipo_zapato  WHERE id_tipo_zapato = " . $id_tipo_zapato;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $tipoPantalondto = new TipoZapatoDTO();
            $tipoPantalondto->constructor(
                $row['id_tipo_pantalon'],
                $row['tipo_pantalon']
            );
        

            return $tipoZapatodto;

        } catch (Exception $e) {
            print "Error al traer los datos del tipo de zapatos" . $e->getMessage();
        }

        return null;

    }


    // --------------------- Actualizar el tipo de zapato ---------------

    public function actualizarZapato($tipoZapatodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_tipo_zapato SET tipo_zapato = ? WHERE id_tipo_zapato = " . $tipoZapatodto->getId_tipo_pantalon();
            $ps= $cnx->prepare($sql);

            $tipo_zapato = $tipoZapatodto->getNombre();

            $ps->bindParam(1, $tipo_zapato);

            $ps->execute();

            return true;


        } catch (Exception $e) {
            print "Error al actualizar un tipo de zapatos " . $e->getMessage();
        }


        return false;

    }

}