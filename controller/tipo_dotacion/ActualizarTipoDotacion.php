<?php

require_once ("../../models/DAO/TipoDotacionDAO.php");

$id_tipo_dotacion = $_POST['id_tipo_dotacion'];
$nombre = $_POST['nombre'];

if (!empty($id_tipo_dotacion) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_tipo_dotacion)) {

        $id_tipo_dotacion = intval($id_tipo_dotacion);

        $tipoDotaciondto = new TipoDotacionDTO();

        $tipoDotaciondto->setId_tipo_dotacion($id_tipo_dotacion);
        $tipoDotaciondto->setNombre($nombre);

        $tipoDotaciondao = new TipoDotacionDAO();

        $resultado = $tipoDotaciondao->actualizarTipoDotacion($tipoDotaciondto);
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡El tipo de dotacion se ha actualizado correctamente!</div>";

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el tipo de dotacion</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código del tipo de dotacion no es valido</div>";
    }

    

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


