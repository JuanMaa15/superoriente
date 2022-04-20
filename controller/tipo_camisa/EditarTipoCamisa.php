<?php

require_once ("../../models/DAO/TipoCamisaDAO.php");


$id_tipo_camisa = intval($_POST['id']);

$tipoCamisadao = new TipoCamisaDAO();

$tipoCamisadto = $tipoCamisadao->listaTipoCamisa($id_tipo_camisa);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código tipo de camisa</label>"
        ."<input class='form-control' type='text' id='id-tipo-camisa-act' value='" . $tipoCamisadto->getId_tipo_camisa() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de camisa</label>"
        ."<input class='form-control' type='text' id='nombre-tipo-camisa-act' value='" . $tipoCamisadto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        
        ."</form>";

echo $form;        




