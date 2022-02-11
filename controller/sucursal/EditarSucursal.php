<?php

require_once ("../../models/DAO/SucursalDAO.php");


$id_sucursal = intval($_POST['id']);

$sucursaldao = new SucursalDAO();

$sucursaldto = $sucursaldao->listaSucursal($id_sucursal);

$form = "<form>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Código de sucursal</label>"
        ."<input class='form-control' type='text' id='id-sucursal-act' value='" . $sucursaldto->getId_sucursal() . "' readonly>"
        ."</div>"
        ."<div class='my-2'>"
        ."<label class='form-label'>Sucursal</label>"
        ."<input class='form-control' type='text' id='nombre-sucursal-act' value='" . $sucursaldto->getNombre() . "'>"
        ."</div>"
        ."</form>";

echo $form;  