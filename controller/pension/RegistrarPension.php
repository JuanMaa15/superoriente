<?php

require_once ("../../models/DAO/PensionDAO.php");


$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $pensiondto = new PensionDTO();

    $pensiondto->setNombre($nombre);

    $pensiondao = new PensionDAO();

    $resultado = $pensiondao->registrarPension($pensiondto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡La pensión se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar la pensión</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
