<?php

require_once ("../../models/DAO/TipoPantalonDAO.php");

$id_tipo_pantalon = $_POST['id_tipo_pantalon'];
$nombre = $_POST['nombre'];

if (!empty($id_tipo_pantalon) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_tipo_pantalon)) {

        $id_tipo_pantalon = intval($id_tipo_pantalon);

        $tipoPantalondto = new TipoPantalonDTO();

        $tipoPantalondto->setId_tipo_pantalon($id_tipo_pantalon);
        $tipoPantalondto->setNombre($nombre);

        $tipoPantalondao = new TipoPantalonDAO();

        $resultado = $tipoPantalondao->actualizarTipoPantalon($tipoPantalondto);
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡El tipo de pantalón se ha actualizado correctamente!</div>";

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el tipo de pantalón</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código del tipo de pantalón no es valido</div>";
    }

    

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


