<?php

require_once ("../../models/DAO/EstadoCivilDAO.php");


$id_estado_civil = intval($_POST['id']);

$estadoCivildao = new EstadoCivilDAO();

$estadoCivildto = $estadoCivildao->listaEstadoCivil($id_estado_civil);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código del estado civil</label>"
        ."<input class='form-control' type='text' id='id-estado-civil-act' value='" . $estadoCivildto->getId_estado_civil() . "' readonly>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Estado civil</label>"
        ."<input class='form-control' type='text' id='nombre-estado-civil-act' value='" . $estadoCivildto->getNombre() . "'>"
        ."</div>"
        ."</form>";

echo $form; 