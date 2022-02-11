<?php

require_once ("../../models/DAO/NivelAcademicoDAO.php");


$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $nivelAcademicodto = new NivelAcademicoDTO();

    $nivelAcademicodto->setNombre($nombre);

    $nivelAcademicodao = new NivelAcademicoDAO();

    $resultado = $nivelAcademicodao->registrarNivelAcademico($nivelAcademicodto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡El nivel academico se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el nivel academico</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
