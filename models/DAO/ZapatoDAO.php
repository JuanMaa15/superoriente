<?php

require_once('../../config/conexion.php');
require_once('../../models/DTO/ZapatoDTO.php');

class ZapatoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de cargos ------------------------------------

    public function listaZapatos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_zapato AS tz INNER JOIN tbl_tipo_dotacion AS ttd ON tz.id_tipo_dotacion = ttd.id_tipo_dotacion INNER JOIN tbl_tipo_zapato AS ttz ON tz.id_tipo_zapato = ttz.id_tipo_zapato";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new ZapatoDTO();
                $lista[$i]->constructor(
                    $row['id_zapato'],
                    $row['tipo_zapato'],
                    $row['tipo_dotacion'],
                    $row['talla'],
                    $row['cantidad'],
                    $row['estado']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los zapatos" . $e->getMessage();
        }

        return null;

    }

    // ----------------------- Lista de zapatos con ID ------------------------------------

    public function listaZapatosId() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_zapato";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new ZapatoDTO();
                $lista[$i]->constructor(
                    $row['id_zapato'],
                    $row['id_tipo_zapato'],
                    $row['id_tipo_dotacion'],
                    $row['talla'],
                    $row['cantidad'],
                    $row['estado']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los zapatos" . $e->getMessage();
        }

        return null;

    }



    //------------------- Registrar cargo ----------------

    public function registrarZapato($zapatodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_zapato(id_tipo_zapato, id_tipo_dotacion, talla, cantidad, estado) VALUES (?,?,?,?,?)";
            $ps = $cnx->prepare($sql);

            $zapato = $zapatodto->getNombre();
            $tipo_dotacion = $zapatodto->getTipo_dotacion();
            $talla = $zapatodto->getTalla();
            $cantidad = $zapatodto->getCantidad();
            $estado = $zapatodto->getEstado();

            $ps->bindParam(1, $zapato);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $talla);
            $ps->bindParam(4, $cantidad);
            $ps->bindParam(5, $estado);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un zapato " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un cargo -----------------------------

    public function listaZapato($id_zapato) {

        $cnx = Conexion::conectar();
        $zapatodto = null;

        try {
            $sql = "SELECT * FROM tbl_zapato AS tz INNER JOIN tbl_tipo_zapato AS ttz ON tz.id_tipo_zapato = ttz.id_tipo_zapato WHERE id_zapato = " . $id_zapato;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $zapatodto = new ZapatoDTO();
            $zapatodto->constructor(
                $row['id_zapato'],
                $row['tipo_zapato'],
                $row['id_tipo_dotacion'],
                $row['talla'],
                $row['cantidad'],
                $row['estado']
            );

             
            return $zapatodto;

        } catch (Exception $e) {
            print "Error al traer los datos del zapato" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actualizar cargo ----------------

    public function actualizarZapato($zapatodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_zapato SET id_tipo_zapato = ?, id_tipo_dotacion = ?, talla = ?, cantidad = ?, estado = ? WHERE id_zapato = " . $zapatodto->getId_zapato();
            $ps = $cnx->prepare($sql);

            $zapato = $zapatodto->getNombre();
            $tipo_dotacion = $zapatodto->getTipo_dotacion();
            $talla = $zapatodto->getTalla();
            $cantidad = $zapatodto->getCantidad();
            $estado = $zapatodto->getEstado();

            $ps->bindParam(1, $zapato);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $talla);
            $ps->bindParam(4, $cantidad);
            $ps->bindParam(5, $estado);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un zapato" . $ex->getMessage();
        }

        return false;

    }


    // --------------------------- Actualizar cantidad de pares de zapatos restantes ----------------


    public function actualizarCantidadZapato($zapatodto) {
        $cnx = Conexion::conectar();

        try {
            if ($zapatodto->getCantidad() <= 0) {
                $sql = "UPDATE tbl_zapato SET cantidad = ?, estado = 0 WHERE id_zapato = ". $zapatodto->getId_zapato();
            }else{
                $sql = "UPDATE tbl_zapato SET cantidad = ? WHERE id_zapato = ". $zapatodto->getId_zapato();

            }
            $ps = $cnx->prepare($sql);

            $cantidad = $zapatodto->getCantidad();

            $ps->bindParam(1, $cantidad);

            $ps->execute();

            

            return true;
        } catch (Exception $e) {
            echo "Error al actualizar la cantidad de los zapatos " . $e->getMessage();
        }
    }


}