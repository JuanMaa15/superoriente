<?php

require_once('../../config/conexion.php');
require_once('../../models/DTO/CamisaDTO.php');

class CamisaDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */


    

    // ----------------------- Lista de cargos ------------------------------------

    public function listaCamisas() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_camisa AS tc INNER JOIN tbl_tipo_dotacion AS ttd ON tc.id_tipo_dotacion = ttd.id_tipo_dotacion";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new CamisaDTO();
                $lista[$i]->constructor(
                    $row['id_camisa'],
                    $row['camisa'],
                    $row['tipo_dotacion'],
                    $row['talla'],
                    $row['cantidad'],
                    $row['estado']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las camisas" . $e->getMessage();
        }

        return null;

    }

    // Lista de camisas con IDs

    public function listaCamisasId() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_camisa";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new CamisaDTO();
                $lista[$i]->constructor(
                    $row['id_camisa'],
                    $row['camisa'],
                    $row['id_tipo_dotacion'],
                    $row['talla'],
                    $row['cantidad'],
                    $row['estado']
                );
                $i++; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de las camisas" . $e->getMessage();
        }

        return null;

    }



    //------------------- Registrar cargo ----------------

    public function registrarCamisa($camisadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_camisa(camisa, id_tipo_dotacion, talla, cantidad, estado) VALUES (?,?,?,?,?)";
            $ps = $cnx->prepare($sql);

            $camisa = $camisadto->getNombre();
            $tipo_dotacion = $camisadto->getTipo_dotacion();
            $talla = $camisadto->getTalla();
            $cantidad = $camisadto->getCantidad();
            $estado = $camisadto->getEstado();

            $ps->bindParam(1, $camisa);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $talla);
            $ps->bindParam(4, $cantidad);
            $ps->bindParam(5, $estado);

            $ps->execute();

            return true;

            

        } catch (Exception $e) {
            print "Error al registrar una camisa " . $e->getMessage();
        }

        return false;

    }

    

    // -------------------- Datos de una camisa -----------------------------

    public function listaCamisa($id_camisa) {

        $cnx = Conexion::conectar();
        $camisadto = null;

        try {
            $sql = "SELECT * FROM tbl_camisa WHERE id_camisa = " . $id_camisa;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $camisadto = new CamisaDTO();
            $camisadto->constructor(
                $row['id_camisa'],
                $row['camisa'],
                $row['id_tipo_dotacion'],
                $row['talla'],
                $row['cantidad'],
                $row['estado']
            );

             
            return $camisadto;

        } catch (Exception $e) {
            print "Error al traer los datos de la camisa" . $e->getMessage();
        }

        return $camisadto;

    }

    // --------------------------- Actualizar camisa ----------------

    public function actualizarCamisa($camisadto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_camisa SET camisa = ?, id_tipo_dotacion = ?, talla = ?, cantidad = ?, estado = ? WHERE id_camisa = " . $camisadto->getId_camisa();
            
            $ps = $cnx->prepare($sql);

            $camisa = $camisadto->getNombre();
            $tipo_dotacion = $camisadto->getTipo_dotacion();
            $talla = $camisadto->getTalla();
            $cantidad = $camisadto->getCantidad();
            $estado = $camisadto->getEstado();

            $ps->bindParam(1, $camisa);
            $ps->bindParam(2, $tipo_dotacion);
            $ps->bindParam(3, $talla);
            $ps->bindParam(4, $cantidad);
            $ps->bindParam(5, $estado);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar una camisa" . $ex->getMessage();
        }

        return false;

    }


    // --------------------------- Actualizar cantidad de camisas restantes ----------------


    public function actualizarCantidadCamisa($camisadto) {
        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_camisa SET cantidad = ? WHERE id_camisa = ". $camisadto->getId_camisa();
            $ps = $cnx->prepare($sql);

            $cantidad = $camisadto->getCantidad();

            $ps->bindParam(1, $cantidad);

            $ps->execute();

            return true;
        } catch (Exception $e) {
            echo "Error al actualizar la cantidad de las camisas " . $e->getMessage();
        }
    }


}