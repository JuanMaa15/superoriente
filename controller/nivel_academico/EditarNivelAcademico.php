<?php

require_once ("../../models/DAO/NivelAcademicoDAO.php");


$id_nivel_academico = intval($_POST['id']);

$NivelAcademicodao = new NivelAcademicoDAO();

$nivelAcademicodto = $NivelAcademicodao->listaNivelAcademico($id_nivel_academico);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de nivel academico</label>"
        ."<input class='form-control' type='text' id='id-nivel-academico-act' value='" . $nivelAcademicodto->getId_nivel_academico() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Nivel academico</label>"
        ."<input class='form-control' type='text' id='nombre-nivel-academico-act' value='" . $nivelAcademicodto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  