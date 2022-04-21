<?php

require_once ("../../models/DAO/ClaseRiesgoDAO.php");

$id_clase_riesgo = $_POST['id_clase_riesgo'];
$nombre = $_POST['nombre'];
$porcentaje = $_POST['porcentaje'];

if (!empty($id_clase_riesgo) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_clase_riesgo)) {

        $id_clase_riesgo = intval($id_clase_riesgo);
        $porcentaje = floatval($porcentaje);

        $claseRiesgodto = new ClaseRiesgoDTO();

        $claseRiesgodto->setId_clase_riesgo($id_clase_riesgo);
        $claseRiesgodto->setNombre($nombre);
        $claseRiesgodto->setNombre($porcentaje);

        $claseRiesgodao = new ClaseRiesgoDAO();

        $resultado = $claseRiesgodao->actualizarClaseRiesgo($cesantiadto);
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡La cesantía se ha actualizado correctamente!</div>";

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la cesantía</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código de la cesantía no es valido</div>";
    }

    

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


