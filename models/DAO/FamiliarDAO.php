<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/FamiliarDTO.php");

class FamiliarDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

   //------------------------ Datos de un familiar ------------

    public function listaUnFamiliar($id_familiar) {
        $cnx = Conexion::conectar();
        $familiardto = null;

        try {
            $sql = "SELECT * FROM tbl_familiar WHERE id_familiar = " . $id_familiar;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();
            $familiardto = new FamiliarDTO();
            $familiardto->constructor(
                    $row['id_familiar'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['edad'],
                    $row['escolaridad'],
                    $row['parentesco'],
                    $row['id_usuario']
            );

            return $familiardto;
        } catch (Exception $ex) {
            print "Error al traer los datos del familiar" . $ex->getMessage();
        }
    }

     // ------------------------- Lista familiar -----------------

    public function listaFamiliar($id_usuario) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_familiar WHERE id_usuario = ". $id_usuario;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {

                $lista[$i] = new FamiliarDTO();
                $lista[$i]->constructor(
                    $row['id_familiar'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['edad'],
                    $row['escolaridad'],
                    $row['parentesco'],
                    $row['id_usuario']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $ex) {
            print "Error al traer la lista de los familiares" . $ex->getMessage();
        }

        return null;

    }

    // ----------------- Registrar Familiar ---------------------

    public function registrarFamiliar($familiardto) {

        $cnx = Conexion::conectar();

        try {
            
            $sql = "INSERT INTO tbl_familiar (id_familiar, nombre, apellido, edad, escolaridad, parentesco, id_usuario) VALUES (?,?,?,?,?,?,?)";
            $ps = $cnx->prepare($sql);

            $id_familiar = $familiardto->getId_familiar();
            $nombre = $familiardto->getNombre();
            $apellido = $familiardto->getApellido();
            $edad = $familiardto->getEdad();
            $escolaridad = $familiardto->getEscolaridad();
            $parentesco = $familiardto->getParentesco();
            $usuario = $familiardto->getUsuario();

            $ps->bindParam(1, $id_familiar);
            $ps->bindParam(2, $nombre);
            $ps->bindParam(3, $apellido);
            $ps->bindParam(4, $edad);
            $ps->bindParam(5, $escolaridad);
            $ps->bindParam(6, $parentesco);
            $ps->bindParam(7, $usuario);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al registrar los datos de los familiares ". $ex->getMessage();
        }
        
        return false;

    }

    // ---------------------------- Actualizar datos familiares -------------------------

    public function actualizarDatosFamiliares($familiardto) {

        $cnx = Conexion::conectar();

        try {
            
            $sql = "UPDATE tbl_familiar SET  nombre = ?, apellido = ?, edad = ?, escolaridad = ?, parentesco = ? WHERE id_familiar = '" . $familiardto->getId_familiar() . "'";
            $ps = $cnx->prepare($sql);

            //$id_familiar = $familiardto->getId_familiar();
            $nombre = $familiardto->getNombre();
            $apellido = $familiardto->getApellido();
            $edad = $familiardto->getEdad();
            $escolaridad = $familiardto->getEscolaridad();
            $parentesco = $familiardto->getParentesco();
            //$usuario = $familiardto->getUsuario();

            $ps->bindParam(1, $nombre);
            $ps->bindParam(2, $apellido);
            $ps->bindParam(3, $edad);
            $ps->bindParam(4, $escolaridad);
            $ps->bindParam(5, $parentesco);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al actualizar los datos familiares ". $ex->getMessage();
        }
        
        return false;

    }


    // Eliminar familiar 

    public function eliminarFamiliar($id_familiar) {

        $cnx = Conexion::conectar();

        try {
            $sql = "DELETE FROM tbl_familiar WHERE id_familiar = " . $id_familiar;
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al eliminar un familiar " . $ex->getMessage();
        }

        return false;

    }

}