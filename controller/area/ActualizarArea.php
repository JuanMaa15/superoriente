<?php

require_once ("../../models/DAO/AreaDAO.php");

$id_area = intval($_POST['id_area']);
$nombre = $_POST['nombre'];

if (!empty($id_area) && !empty($nombre)) {

    $areadto = new AreaDTO();

    $areadto->setId_area($id_area);
    $areadto->setNombre($nombre);

    $areadao = new AreaDAO();

    $resultado = $areadao->actualizarArea($areadto);
 
    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡El area se ha actualizado correctamente!</div>";

    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el area</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


