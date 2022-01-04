<?php

require_once ("../../models/DAO/TipoDocumentoDAO.php");
require_once ("../../models/DTO/TipoDocumentoDTO.php");

$id_tipo_documento = intval($_POST['id_tipo_documento']);
$tipo_documento = $_POST['tipo_documento'];

$tipoDocumentodto = new TipoDocumentoDTO();

$tipoDocumentodto->setId_tipo_documento($id_tipo_documento);
$tipoDocumentodto->setTipo_documento($tipo_documento);

$tipoDocumentodao = new TipoDocumentoDAO();

$resultado = $tipoDocumentodao->actualizarTipoDocumento($tipoDocumentodto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El documento se ha actualizado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el documento</div>";
}