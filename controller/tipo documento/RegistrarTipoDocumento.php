<?php

require_once ("../../models/DAO/TipoDocumentoDAO.php");
require_once ("../../models/DTO/TipoDocumentoDTO.php");

$nombre = $_POST['nombre'];

$tipoDocumentodto = new TipoDocumentoDTO();

$tipoDocumentodto->setTipo_documento($nombre);

$tipoDocumentodao = new TipoDocumentoDAO();

$resultado = $tipoDocumentodao->registrarTipoDocumento($tipoDocumentodto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El documento se ha registrado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el documento</div>";
}