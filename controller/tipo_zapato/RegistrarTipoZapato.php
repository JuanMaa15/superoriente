<?php

require_once ("../../models/DAO/TipoZapatoDAO.php");

$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $tipoZapatodto = new TipoZapatoDTO();

    $tipoZapatodto->setNombre($nombre);

    $tipoZapatodao = new TipoZapatoDAO();

    $resultado = $tipoZapatodao->registrarTipoZapato($tipoZapatodto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>!El tipo de zapato se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el tipo de zapato</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
