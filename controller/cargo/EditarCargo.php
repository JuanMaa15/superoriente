<?php

require_once ("../../models/DAO/CargoDAO.php");


$id_cargo = intval($_POST['id']);

$cargodao = new CargoDAO();

$cargodto = $cargodao->listaCargo($id_cargo);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de cargo</label>"
        ."<input class='form-control' type='text' id='id-cargo-act' value='" . $cargodto->getId_cargo() . "' readonly>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Cargo</label>"
        ."<input class='form-control' type='text' id='nombre-cargo-act' value='" . $cargodto->getNombre() . "'>"
        ."</div>"
        ."</form>";

echo $form;  