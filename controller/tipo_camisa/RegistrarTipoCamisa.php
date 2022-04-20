<?php

require_once ("../../models/DAO/TipoCamisaDAO.php");

$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $tipoCamisadto = new TipoCamisaDTO();

    $tipoCamisadto->setNombre($nombre);

    $tipoCamisadao = new TipoCamisaDAO();

    $resultado = $tipoCamisadao->registrarTipoCamisa($tipoCamisadto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>!El tipo de camisa se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el tipo de camisa</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
