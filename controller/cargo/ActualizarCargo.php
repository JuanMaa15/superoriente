<?php

require_once ("../../models/DAO/CargoDAO.php");


$id_cargo = $_POST['id_cargo'];
$nombre = $_POST['nombre'];
$id_seccion = $_POST['id_seccion'];
$id_area = $_POST['id_area'];

if (!empty($id_cargo) && !empty($nombre) && !empty($id_seccion) && !empty($id_area)) {

    if (preg_match('/[0-9]+/',$id_cargo)) {

        if (preg_match('/[0-9]+/',$id_seccion)) {

            if (preg_match('/[0-9]+/',$id_area)) {

                $id_cargo = intval($id_cargo);
                $id_seccion = intval($id_seccion);
                $id_area = intval($id_area);
    
                $cargodto = new CargoDTO();
    
                $cargodto->setId_cargo($id_cargo);
                $cargodto->setNombre($nombre);
                $cargodto->setSeccion($id_seccion);
                $cargodto->setArea($id_seccion);
    
                $cargodao = new CargoDAO();
    
                $resultado = $cargodao->actualizarCargo($cargodto);
    
                if ($resultado) {
                    echo "<div class='alert alert-success' role='alert'>¡El cargo de trabajo se ha actualizado correctamente!</div>";
                
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el cargo de trabajo</div>";
                }
    
            }else{
                echo "<div class='alert alert-danger' role='alert'>El código del area no es valido</div>";
            }
    
        }else{
            echo "<div class='alert alert-danger' role='alert'>El código de la sección no es valido</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código del cargo</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}


