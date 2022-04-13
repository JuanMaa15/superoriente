<?php

require_once ("../../models/DAO/CesantiaDAO.php");


$id_cesantia = intval($_POST['id']);

$cesantiadao = new CesantiaDAO();

$cesantiadto = $cesantiadao->listaCesantia($id_cesantia);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de cesantía</label>"
        ."<input class='form-control' type='text' id='id-cesantia-act' value='" . $cesantiadto->getId_cesantia() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>EPS</label>"
        ."<input class='form-control' type='text' id='nombre-cesantia-act' value='" . $cesantiadto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  