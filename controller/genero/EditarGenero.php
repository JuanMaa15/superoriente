<?php

require_once ("../../models/DAO/GeneroDAO.php");


$id_genero = intval($_POST['id']);

$generodao = new GeneroDAO();

$generodto = $generodao->listaGenero($id_genero);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código genero</label>"
        ."<input class='form-control' type='text' id='id-genero-act' value='" . $generodto->getId_genero() . "' readonly>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Género</label>"
        ."<input class='form-control' type='text' id='nombre-genero-act' value='" . $generodto->getNombre() . "'>"
        ."</div>"
        ."</form>";

echo $form;        




