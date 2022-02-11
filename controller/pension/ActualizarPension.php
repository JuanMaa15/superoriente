<?php

require_once ("../../models/DAO/PensionDAO.php");

$id_pension = $_POST['id_pension'];
$nombre = $_POST['nombre'];

if (!empty($id_pension) && !empty($nombre)) {


    if (preg_match('/[0-9]+/', $id_pension)) {

        $id_pension = intval($id_pension);

        $pensiondto = new PensionDTO();

        $pensiondto->setId_pension($id_pension);
        $pensiondto->setNombre($nombre);

        $pensiondao = new PensionDAO();

        $resultado = $pensiondao->actualizarPension($pensiondto);
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡La pensión se ha actualizado correctamente!</div>";

        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la pensión</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>El código de al pensión no es valido</div>";
    }

    

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


