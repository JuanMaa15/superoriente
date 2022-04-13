<?php

require_once ("../../models/DAO/CesantiaDAO.php");

$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $cesantiadto = new CesantiaDTO();

    $cesantiadto->setNombre($nombre);

    $cesantiadao = new CesantiaDAO();

    $resultado = $cesantiadao->registrarCesantia($cesantiadto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>!La cesantía se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar la cesantía</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
