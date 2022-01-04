<?php

require_once ("../../models/DAO/TipoDocumentoDAO.php");
require_once ("../../models/DTO/TipoDocumentoDTO.php");

$id_tipo_documento = intval($_POST['id']);

$tipoDocumentodao = new TipoDocumentoDAO();

$tipoDocumentodto = $tipoDocumentodao->listaTipoDocumento($id_tipo_documento);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Nro tipo de documento</label>"
        ."<input class='form-control' type='text' id='id-tipo-documento-act' value='" . $tipoDocumentodto->getId_tipo_documento() . "' readonly>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de documento</label>"
        ."<input class='form-control' type='text' id='tipo-documento-act' value='" . $tipoDocumentodto->getTipo_documento() . "'>"
        ."</div>"
        ."</form>";

echo $form;        




