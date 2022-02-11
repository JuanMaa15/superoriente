<?php

require_once ("../../models/DAO/SeccionDAO.php");


$id_seccion = intval($_POST['id']);

$secciondao = new SeccionDAO();

$secciondto = $secciondao->listaSeccion($id_seccion);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de sección</label>"
        ."<input class='form-control' type='text' id='id-seccion-act' value='" . $secciondto->getId_seccion() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Sección</label>"
        ."<input class='form-control' type='text' id='nombre-seccion-act' value='" . $secciondto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."</form>";

echo $form;  