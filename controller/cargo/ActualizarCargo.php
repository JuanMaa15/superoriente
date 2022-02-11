<?php

require_once ("../../models/DAO/CargoDAO.php");

$id_cargo = intval($_POST['id_cargo']);
$nombre = $_POST['nombre'];

if (!empty($id_cargo) && !empty($nombre)) {

    $cargodto = new CargoDTO();

    $cargodto->setId_cargo($id_cargo);
    $cargodto->setNombre($nombre);

    $cargodao = new CargoDAO();

    $resultado = $cargodao->actualizarCargo($cargodto);
 
    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡El cargo se ha actualizado correctamente!</div>";

    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el cargo</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


