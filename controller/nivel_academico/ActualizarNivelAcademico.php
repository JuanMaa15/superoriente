<?php

require_once ("../../models/DAO/NivelAcademicoDAO.php");

$id_nivel_academico = $_POST['id_nivel_academico'];
$nombre = $_POST['nombre'];

if (!empty($id_nivel_academico) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_nivel_academico)) {

        $id_nivel_academico = intval($id_nivel_academico);

        $nivelAcademicodto = new NivelAcademicoDTO();

        $nivelAcademicodto->setId_nivel_academico($id_nivel_academico);
        $nivelAcademicodto->setNombre($nombre);

        $nivelAcademicodao = new NivelAcademicoDAO();

        $resultado = $nivelAcademicodao->actualizarNivelAcademico($nivelAcademicodto);
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡El nivel academico se ha actualizado correctamente!</div>";

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el nivel academico</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código del nivel academico no es valido</div>";
    }

    

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


