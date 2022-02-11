<?php

require_once ("../../models/DAO/TipoDotacionDAO.php");


$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $tipoDotaciondto = new TipoDotacionDTO();

    $tipoDotaciondto->setNombre($nombre);

    $tipoDotaciondao = new TipoDotacionDAO();

    $resultado = $tipoDotaciondao->registrarTipoDotacion($tipoDotaciondto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡El tipo de dotacion se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el tipo de dotacion</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
