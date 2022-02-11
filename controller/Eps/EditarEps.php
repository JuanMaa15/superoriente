<?php

require_once ("../../models/DAO/EpsDAO.php");


$id_eps = intval($_POST['id']);

$epsdao = new EpsDAO();

$epsdto = $epsdao->listaEps($id_eps);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de EPS</label>"
        ."<input class='form-control' type='text' id='id-eps-act' value='" . $epsdto->getId_eps() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>EPS</label>"
        ."<input class='form-control' type='text' id='nombre-eps-act' value='" . $epsdto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  