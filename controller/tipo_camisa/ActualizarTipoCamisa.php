<?php

require_once ("../../models/DAO/TipoCamisaDAO.php");

$id_tipo_camisa = $_POST['id_tipo_camisa'];
$nombre = $_POST['nombre'];

if (!empty($id_tipo_camisa) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_tipo_camisa)) {

        $id_tipo_camisa = intval($id_tipo_camisa);

        $tipoCamisadto = new TipoCamisaDTO();

        $tipoCamisadto->setId_tipo_camisa($id_tipo_camisa);
        $tipoCamisadto->setNombre($nombre);

        $tipoCamisadao = new TipoCamisaDAO();

        $resultado = $tipoCamisadao->actualizarTipoCamisa($tipoCamisadto);
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡El tipo de camisa se ha actualizado correctamente!</div>";

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el tipo de camisa</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código del tipo de camisa no es valido</div>";
    }

    

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


