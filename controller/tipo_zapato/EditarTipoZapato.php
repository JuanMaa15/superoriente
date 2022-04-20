<?php

require_once ("../../models/DAO/TipoZapatoDAO.php");


$id_tipo_zapato = intval($_POST['id']);

$tipoZapatodao = new TipoZapatoDAO();

$tipoZapatodto = $tipoZapatodao->listaTipoZapato($id_tipo_zapato);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código tipo de zapato</label>"
        ."<input class='form-control' type='text' id='id-tipo-zapato-act' value='" . $tipoZapatodto->getId_tipo_zapato() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de zapato</label>"
        ."<input class='form-control' type='text' id='nombre-tipo-zapato-act' value='" . $tipoZapatodto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        
        ."</form>";

echo $form;        




