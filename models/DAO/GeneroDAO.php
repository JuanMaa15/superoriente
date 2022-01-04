<?php

use JetBrains\PhpStorm\ArrayShape;

require_once("../../config/conexion.php");
require_once("../../models/DTO/GeneroDTO.php");

class GeneroDAO{

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */



    // ------------------------- Lista de generos ---------------------------

    public function listaGeneros() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;
        

        try {
            
            $sql = "SELECT * FROM tbl_genero";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new GeneroDTO();
                $lista[$i]->constructor(
                    $row['id_genero'],
                    $row['genero']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $ex) {
            print "Error al traer la lista de los generos ". $ex->getMessage();
        }

        return null;

    }

    // -------------------------- Registrar un Género --------------------

    public function registrarGenero($generodto) {

        $cnx = Conexion::conectar();

        try {
            
            $sql = "INSERT INTO tbl_genero (genero) VALUES(?)";
            $ps = $cnx->prepare($sql);

            $genero = $generodto->getNombre();

            $ps->bindParam(1, $genero);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            
            print "Error al registrar un género ". $ex->getMessage();
        }

        return false;

    }

    // ------------------------- Datos de un genero ------------------

    public function listaGenero($id_genero) {

        $cnx = Conexion::conectar();
        $generodto = null;

        try {
            
            $sql = "SELECT * FROM tbl_genero WHERE id_genero = " . $id_genero;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $generodto = new GeneroDTO();
            $generodto->constructor(
                $row['id_genero'],
                $row['genero']
            );

            return $generodto;

        } catch (Exception $e) {
            print "Error al traer los datos de un genero " . $e->getMessage();
        }

        return null;

    }


    // ------------------------ Actualizar un género ----------------------------

    public function actualizarGenero($generodto) {

        $cnx = Conexion::conectar();

        try {
            
            $sql = "UPDATE tbl_genero SET genero = ? WHERE id_genero = ". $generodto->getId_genero();
            $ps = $cnx->prepare($sql);

            $genero = $generodto->getNombre();

            $ps->bindParam(1, $genero);

            $ps->execute();
            
            return true;

        } catch (Exception $ex) {
            print "Error al actualizar un género";
        }

        return false;

    }


}