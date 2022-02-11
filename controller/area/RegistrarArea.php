<?php

require_once ("../../models/DAO/AreaDAO.php");


$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $areadto = new AreaDTO();

    $areadto->setNombre($nombre);

    $areadao = new AreaDAO();

    $resultado = $areadao->registrarArea($areadto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡El area de trabajo se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el area de trabajo</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
