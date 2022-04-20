<?php

require_once ("../../models/DAO/TipoPantalonDAO.php");

$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $tipoPantalondto = new TipoPantalonDTO();

    $tipoPantalondto->setNombre($nombre);

    $tipoPantalondao = new TipoPantalonDAO();

    $resultado = $tipoPantalondao->registrarTipoPantalon($tipoPantalondto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>!El tipo de pantalon se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el tipo de pantalon</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
