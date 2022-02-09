<?php

require_once ("../../models/DAO/TipoContratoDAO.php");


$id_tipo_contrato = intval($_POST['id']);

$tipoContratodao = new TipoContratoDAO();

$tipoContratodto = $tipoContratodao->listaTipoContrato($id_tipo_contrato);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Nro tipo de contrato</label>"
        ."<input class='form-control' type='text' id='id-tipo-contrato-act' value='" . $tipoContratodto->getId_tipo_contrato() . "' readonly>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de contrato</label>"
        ."<input class='form-control' type='text' id='tipo-contrato-act' value='" . $tipoContratodto->getNombre() . "'>"
        ."</div>"
        ."</form>";

echo $form;        




