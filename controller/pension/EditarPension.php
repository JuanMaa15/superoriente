<?php

require_once ("../../models/DAO/PensionDAO.php");


$id_pension = intval($_POST['id']);

$pensiondao = new PensionDAO();

$pensiondto = $pensiondao->listaPension($id_pension);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de pensión</label>"
        ."<input class='form-control' type='text' id='id-pension-act' value='" . $pensiondto->getId_pension() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Pensión</label>"
        ."<input class='form-control' type='text' id='nombre-pension-act' value='" . $pensiondto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  