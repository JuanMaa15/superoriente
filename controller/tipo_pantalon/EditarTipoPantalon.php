<?php

require_once ("../../models/DAO/TipoPantalonDAO.php");


$id_tipo_pantalon = intval($_POST['id']);

$tipoPantalondao = new TipoPantalonDAO();

$tipoPantalondto = $tipoPantalondao->listaTipoPantalon($id_tipo_pantalon);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código tipo de pantalón</label>"
        ."<input class='form-control' type='text' id='id-tipo-pantalon-act' value='" . $tipoPantalondto->getId_tipo_pantalon() . "' readonly>"
        ."<small class='text-danger'></small>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Tipo de pantalón</label>"
        ."<input class='form-control' type='text' id='nombre-tipo-pantalon-act' value='" . $tipoPantalondto->getNombre() . "'>"
        ."<small class='text-danger'></small>"
        ."</div>"
        
        ."</form>";

echo $form;        




