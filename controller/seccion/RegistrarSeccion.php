<?php

require_once ("../../models/DAO/SeccionDAO.php");


$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $secciondto = new SeccionDTO();

    $secciondto->setNombre($nombre);

    $secciondao = new SeccionDAO();

    $resultado = $secciondao->registrarSeccion($secciondto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡La sección de trabajo se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar la sección de trabajo</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
