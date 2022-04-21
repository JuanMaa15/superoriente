<?php

require_once ("../../models/DAO/ClaseRiesgoDAO.php");


if (isset($_POST['id'])) {

    $id_clase_riesgo = intval($_POST['id']);

    $claseRiesgodao = new ClaseRiesgoDAO();

    $claseRiesgodto = $claseRiesgodao->listaClaseRiesgo($id_clase_riesgo);

    $form = "<form>"
            ."<div class='my-2'>"
            ."<label class='form-label'>Código clase de riesgo</label>"
            ."<input class='form-control' type='text' id='id-clase-riesgo-act' value='" . $claseRiesgodto->getId_clase_riesgo() . "' readonly>"
            ."<small class='text-danger'></small>"
            ."</div>"
            ."<div class='my-2'>"
            ."<label class='form-label'>Clase de riesgo</label>"
            ."<input class='form-control' type='text' id='nombre-clase-riesgo-act' value='" . $claseRiesgodto->getNombre() . "'>"
            ."<small class='text-danger'></small>"
            ."</div>"
            ."<div class='my-2'>"
            ."<label class='form-label'>Porcentaje</label>"
            ."<input class='form-control' type='text' id='porcentaje-clase-riesgo-act' value='" . $claseRiesgodto->getPorcentaje() . "'>"
            ."<small class='text-danger'></small>"
            ."</div>"
            ."</form>";

    echo $form;
}
  