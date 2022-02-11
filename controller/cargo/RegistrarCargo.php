<?php

require_once ("../../models/DAO/CargoDAO.php");

$nombre = $_POST['nombre'];
$id_seccion = $_POST['id_seccion'];
$id_area = $_POST['id_area'];

if (!empty($nombre) && !empty($id_seccion) && !empty($id_area)) {

    if (preg_match('/[0-9]+/',$id_seccion)) {

        if (preg_match('/[0-9]+/',$id_area)) {

            $id_seccion = intval($id_seccion);
            $id_area = intval($id_area);

            $cargodto = new CargoDTO();

            $cargodto->setNombre($nombre);
            $cargodto->setSeccion($id_seccion);
            $cargodto->setArea($id_area);

            $cargodao = new CargoDAO();

            $resultado = $cargodao->registrarCargo($cargodto);

            if ($resultado) {
                echo "<div class='alert alert-success' role='alert'>¡El cargo de trabajo se ha registrado correctamente!</div>";
            
            }else{
                echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el cargo de trabajo</div>";
            }

        }else{
            echo "<div class='alert alert-danger' role='alert'>El código del area no es valido</div>";
        }

    }else{
        echo "<div class='alert alert-danger' role='alert'>El código de la sección no es valido</div>";
    }

   

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
