<?php

require_once("../../config/conexion.php");
require_once("../../models/DTO/TipoDocumentoDTO.php");

class TipoDocumentoDAO {

    var $ps; /* PreparedStatement */
    var $rs; /* ResultSet */
    var $st; /* Statement */


    // ----------------------------- Registrar tipo de documento --------------------

    public function registrarTipoDocumento($tipoDocumentodto) {

        $cnx = Conexion::conectar();

        try {
            
            $sql = "INSERT INTO tbl_tipo_documento (tipo_documento) VALUES (?)";
            $ps = $cnx->prepare($sql);

            $nombre = $tipoDocumentodto->getTipo_documento();

            $ps->bindParam(1, $nombre);

            $ps->execute();

            return true;
            

        } catch (Exception $e) {
            print "Error al resgistrar un tipo de documento " . $e->getMessage();
        }

        return false;

    }

    // ----------------------- Lista de tipos de documentos ------------------------------------

    public function listaTiposDocumentos() {

        $cnx = Conexion::conectar();
        $lista = array();
        $i = 0;

        try {
            $sql = "SELECT * FROM tbl_tipo_documento";
            $rs = $cnx->query($sql);

            while ($row = $rs->fetch()) {

                $lista[$i] = new TipoDocumentoDTO();
                $lista[$i]->constructor(
                    $row['id_tipo_documento'],
                    $row['tipo_documento']
                );
                $i += 1; 
            }

            return $lista;

        } catch (Exception $e) {
            print "Error al traer la lista de los tipos de documentos";
        }

        return null;

    }

    // -------------------------------- Datos de un Tipo de documento ------------------

    public function listaTipoDocumento($id_tipo_documento) {
    
        $cnx = Conexion::conectar();
        $tipoDocumentodto = null;

        try {
            
            $sql = "SELECT * FROM tbl_tipo_documento WHERE id_tipo_documento = " . $id_tipo_documento;
            $rs = $cnx->query($sql);

            $row = $rs->fetch();

            $tipoDocumentodto = new TipoDocumentoDTO();
            $tipoDocumentodto->constructor(
                $row['id_tipo_documento'],
                $row['tipo_documento']
            );

            return $tipoDocumentodto;

        } catch (Exception $e) {
            print "Error al traer los datos de un tipo de documento " . $e->getMessage();
        }

        return null;


    }

    // ------------------------- Actualizar un tipo de documento -------------
    
    public function actualizarTipoDocumento($tipoDocumentodto) {

        $cnx = Conexion::conectar();

        try {
            $sql = "UPDATE tbl_tipo_documento SET tipo_documento = ? WHERE id_tipo_documento = " . $tipoDocumentodto->getId_tipo_documento();
            $ps = $cnx->prepare($sql);
            
            $nombre = $tipoDocumentodto->getTipo_documento();

            $ps->bindParam(1, $nombre);

            $ps->execute();

            return true;

        } catch (Exception $e) {
            print "Error al actualizar un tipo de documento " . $e->getMessage();
        }

        return false;

    }

}