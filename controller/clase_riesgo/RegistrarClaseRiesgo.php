<?php

require_once ("../../models/DAO/ClaseRiesgoDAO.php");

$nombre = $_POST['nombre'];
$porcentaje = $_POST['porcentaje'];

if (!empty($nombre) && !empty($porcentaje)) {

    $porcentaje = floatval($porcentaje);

    $claseRiesgodto = new ClaseRiesgoDTO();

    $claseRiesgodto->setNombre($nombre);
    $claseRiesgodto->setPorcentaje($porcentaje);

    $claseRiesgodao = new ClaseRiesgoDAO();

    $resultado = $claseRiesgodao->registrarClaseRiesgo($claseRiesgodto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>!La clase de riesgo se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar la clase de riesgo</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
