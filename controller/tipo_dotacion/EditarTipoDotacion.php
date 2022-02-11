<?php

require_once ("../../models/DAO/TipoDotacionDAO.php");


$id_tipo_dotacion = intval($_POST['id']);

$tipoDotaciondao = new TipoDotacionDAO();

$tipoDotaciondto = $tipoDotaciondao->listaTipoDotacion($id_tipo_dotacion);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código tipo de dotación</label>"
        ."<input class='form-control' type='text' id='id-tipo-notacion-act' value='" . $tipoDotaciondto->getId_tipo_dotacion() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de dotación</label>"
        ."<input class='form-control' type='text' id='nombre-tipo-dotacion-act' value='" . $tipoDotaciondto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  