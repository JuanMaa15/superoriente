<?php

require_once('../../config/conexion.php');
require_once('../../models/DTO/PantalonDTO.php');

class PantalonDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // ----------------------- Lista de cargos ------------------------------------

    public function listaPantalones() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_pantalon AS tp INNER JOIN tbl_tipo_dotacion AS ttd ON tp.id_tipo_dotacion = ttd.id_tipo_dotacion INNER JOIN tbl_tipo_pantalon AS ttp ON tp.id_tipo_pantalon = ttp.id_tipo_pantalon INNER JOIN tbl_genero AS tg ON tp.id_genero = tg.id_genero";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new PantalonDTO();
                $lista[$i]->constructor(
                    $row['id_pantalon'],
                    $row['tipo_pantalon'],
                    $row['tipo_dotacion'],
                    $row['talla'],
                    $row['cantidad'],
                    $row['estado'],
                    $row['genero']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los pantalones" . $e->getMessage();
        }

        return null;

    }

    // Lista de pantalones con ID

    public function listaPantalonesId() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_pantalon";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new PantalonDTO();
                $lista[$i]->constructor(
                    $row['id_pantalon'],
                    $row['id_tipo_pantalon'],
                    $row['id_tipo_dotacion'],
                    $row['talla'],
                    $row['cantidad'],
                    $row['estado'],
                    $row['id_genero']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los pantalones" . $e->getMessage();
        }

        return null;

    }




    //------------------- Registrar cargo ----------------

    public function registrarPantalon($pantalondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_pantalon(id_tipo_pantalon, id_tipo_dotacion, talla, cantidad, estado, id_genero) VALUES (?,?,?,?,?,?)";
            $ps = $cnx->prepare($sql);

            $pantalon = $pantalondto->getNombre();
            $tipo_dotacion = $pantalondto->getTipo_dotacion();
            $talla = $pantalondto->getTalla();
            $cantidad = $pantalondto->getCantidad();
            $estado = $pantalondto->getEstado();
            $genero = $pantalondto->getGenero();

            $ps->bindParam(1, $pantalon);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $talla);
            $ps->bindParam(4, $cantidad);
            $ps->bindParam(5, $estado);
            $ps->bindParam(6, $genero);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar un pantalón " . $e->getMessage();
        }

        return false;

    }


    // -------------------- Datos de un cargo -----------------------------

    public function listaPantalon($id_pantalon) {

        $cnx = Conexion::conectar();
        $pantalondto = null;

        try {
            $sql = "SELECT * FROM tbl_pantalon WHERE id_pantalon = " . $id_pantalon;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $pantalondto = new PantalonDTO();
            $pantalondto->constructor(
                $row['id_pantalon'],
                $row['id_tipo_pantalon'],
                $row['id_tipo_dotacion'],
                $row['talla'],
                $row['cantidad'],
                $row['estado'],
                $row['id_genero']
            );

             
            return $pantalondto;

        } catch (Exception $e) {
            print "Error al traer los datos del pantalón" . $e->getMessage();
        }

        return null;

    }

    // --------------------------- Actualizar cargo ----------------

    public function actualizarPantalon($pantalondto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_pantalon SET id_tipo_pantalon = ?, id_tipo_dotacion = ?, talla = ?, cantidad = ?, estado = ?, id_genero = ? WHERE id_pantalon = " . $pantalondto->getId_pantalon();
            $ps = $cnx->prepare($sql);

            $pantalon = $pantalondto->getNombre();
            $tipo_dotacion = $pantalondto->getTipo_dotacion();
            $talla = $pantalondto->getTalla();
            $cantidad = $pantalondto->getCantidad();
            $estado = $pantalondto->getEstado();
            $genero = $pantalondto->getGenero();

            $ps->bindParam(1, $pantalon);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $talla);
            $ps->bindParam(4, $cantidad);
            $ps->bindParam(5, $estado);
            $ps->bindParam(6, $genero);

            $ps->execute();

            return true;


        } catch (Exception $ex) {
            print "Error al actualizar un pantalón" . $ex->getMessage();
        }

        return false;

    }


    // --------------------------- Actualizar cantidad de pantalones restantes ----------------


    public function actualizarCantidadPantalon($pantalondto) {
        $cnx = Conexion::conectar();

        try {
            if ($pantalondto->getCantidad() <= 0) {
                $sql = "UPDATE tbl_pantalon SET cantidad = ?, estado = 0 WHERE id_pantalon = ". $pantalondto->getId_pantalon();
            }else{
                $sql = "UPDATE tbl_pantalon SET cantidad = ? WHERE id_pantalon = ". $pantalondto->getId_pantalon();

            }
            $ps = $cnx->prepare($sql);

            $cantidad = $pantalondto->getCantidad();

            $ps->bindParam(1, $cantidad);

            $ps->execute();

            

            return true;
        } catch (Exception $e) {
            echo "Error al actualizar la cantidad de los pantalones " . $e->getMessage();
        }
    }


}