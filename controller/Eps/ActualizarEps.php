<?php

require_once ("../../models/DAO/EpsDAO.php");

$id_eps = $_POST['id_eps'];
$nombre = $_POST['nombre'];

if (!empty($id_eps) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_eps)) {

        $id_eps = intval($id_eps);

        $epsdto = new EpsDTO();

        $epsdto->setId_eps($id_eps);
        $epsdto->setNombre($nombre);

        $epsdao = new EpsDAO();

        $resultado = $epsdao->actualizarEps($epsdto);
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡La EPS se ha actualizado correctamente!</div>";

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la EPS</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código de la EPS no es valido</div>";
    }

    

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


