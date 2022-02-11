<?php

require_once ("../../models/DAO/CargoDAO.php");


$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $cargodto = new CargoDTO();

    $cargodto->setNombre($nombre);

    $cargodao = new CargoDAO();

    $resultado = $cargodao->registrarCargo($cargodto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡El cargo de trabajo se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el cargo de trabajo</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
