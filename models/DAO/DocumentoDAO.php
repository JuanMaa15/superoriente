<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/DocumentoDTO.php");

class DocumentoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */

    // Lista de documentos por usuario


    public function listaDocumentos($id_usuario) {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_documento WHERE id_usuario = '$id_usuario';";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {
                $lista[$i] = new DocumentoDTO();
                $lista[$i]->constructor(
                    $row['id_documento'],
                    $row['id_usuario'],
                    $row['titulo'],
                    $row['ruta'],
                    $row['fecha']
                );

                $i++;
            }

            return $lista;
        } catch (Exception $ex) {
            echo "Error al traer la lista de los documentos " . $ex->getMessage();
        }

        return null;

    }


    // --------------------- Registrar un documento ----------------

    public function registrarDocumento($documentodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "INSERT INTO tbl_documento (id_usuario, titulo, ruta, fecha) VALUES (?,?,?, GETDATE());";
            $ps = $cnx->prepare($sql);

            $usuario = $documentodto->getUsuario();
            $titulo = $documentodto->getNombre();
            $ruta = $documentodto->getRuta();

            $ps->bindParam(1, $usuario);
            $ps->bindParam(2, $titulo);
            $ps->bindParam(3, $ruta);

            $ps->execute();

            return true;
        } catch (Exception $ex) {
            echo "Error al registrar un documento " . $ex->getMessage();
        }

        return false;
    }


    public function eliminarDocumento($id_documento) {
        $cnx = Conexion::conectar();

        try {
            $sql = "DELETE FROM tbl_documento WHERE id_documento = $id_documento;";
            $ps = $cnx->prepare($sql);

            $ps->execute();

            return true;
        } catch (Exception $ex) {
            echo "Error al eliminar un documento " . $ex->getMessage();
        }

        return false;
    }

}