<?php

require_once ("../../models/DAO/EpsDAO.php");


$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $epsdto = new EpsDTO();

    $epsdto->setNombre($nombre);

    $epsdao = new EpsDAO();

    $resultado = $epsdao->registrarEps($epsdto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>!La EPS se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar la EPS</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
