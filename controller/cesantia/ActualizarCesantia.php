<?php

require_once ("../../models/DAO/CesantiaDAO.php");

$id_cesantia = $_POST['id_cesantia'];
$nombre = $_POST['nombre'];

if (!empty($id_cesantia) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_cesantia)) {

        $id_cesantia = intval($id_cesantia);

        $cesantiadto = new CesantiaDTO();

        $cesantiadto->setId_cesantia($id_cesantia);
        $cesantiadto->setNombre($nombre);

        $cesantiadao = new CesantiaDAO();

        $resultado = $cesantiadao->actualizarCesantia($cesantiadto);
    
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


