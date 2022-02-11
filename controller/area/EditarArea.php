<?php

require_once ("../../models/DAO/AreaDAO.php");


$id_area = intval($_POST['id']);

$areadao = new AreaDAO();

$areadto = $areadao->listaArea($id_area);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de area</label>"
        ."<input class='form-control' type='text' id='id-area-act' value='" . $areadto->getId_area() . "' readonly>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Area</label>"
        ."<input class='form-control' type='text' id='nombre-area-act' value='" . $areadto->getNombre() . "'>"
        ."</div>"
        ."</form>";

echo $form;  