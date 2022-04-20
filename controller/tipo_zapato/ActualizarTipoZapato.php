<?php

require_once ("../../models/DAO/TipoZapatoDAO.php");

$id_tipo_zapato = $_POST['id_tipo_zapato'];
$nombre = $_POST['nombre'];

if (!empty($id_tipo_zapato) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_tipo_zapato)) {

        $id_tipo_zapato = intval($id_tipo_zapato);

        $tipoZapatodto = new TipoZapatoDTO();

        $tipoZapatodto->setId_tipo_zapato($id_tipo_zapato);
        $tipoZapatodto->setNombre($nombre);

        $tipoZapatodao = new TipoZapatoDAO();

        $resultado = $tipoZapatodao->actualizarTipoZapato($tipoZapatodto);
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡El tipo de zapato se ha actualizado correctamente!</div>";

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el tipo de zapato</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código del tipo de pantalón no es valido</div>";
    }

    

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


