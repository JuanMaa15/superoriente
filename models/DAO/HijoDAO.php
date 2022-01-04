<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/HijoDTO.php");

class HijoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */


    // --------------------- Lista Hijo ----------------

    public function listaHijo($id_usuario) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            
            $sql = "SELECT * FROM tbl_hijo WHERE id_usuario = ". $id_usuario;
            $rs = $cnx->query($sql);

            while($row = $rs->fetch()) {

                $lista[$i] = new HijoDTO();
                $lista[$i]->constructor(
                    $row['id_hijo'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['edad'],
                    $row['fecha_nacimiento'],
                    $row['id_usuario']
                );

                $i++;
            }

            return $lista;

        } catch (Exception $ex) {
            print "Error al traer la lista de los hijos" . $ex->getMessage();
        }

        return null;

    }

    // ----------------------- Registrar Hijo -------------------

    public function registrarHijo($hijodto) {

        $cnx = Conexion::conectar();

        try {
            
            $sql = "INSERT INTO tbl_hijo(nombre, apellido, edad, fecha_nacimiento, id_usuario) VALUES (?,?,?,?,?)";
            $ps = $cnx->prepare($sql);

            $nombre = $hijodto->getNombre();
            $apellido = $hijodto->getApellido();
            $edad = $hijodto->getEdad();
            $fecha_nacimiento = $hijodto->getFecha_nacimiento();
            $usuario = $hijodto->getUsuario();

            $ps->bindParam(1, $nombre);
            $ps->bindParam(2, $apellido);
            $ps->bindParam(3, $edad);
            $ps->bindParam(4, $fecha_nacimiento);
            $ps->bindParam(5, $usuario);

            $ps->execute();

            return true;

        } catch (Exception $ex) {
            print "Error al registrar los datos de los hijos ". $ex->getMessage();
        }

    }

}