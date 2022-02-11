<?php

require_once ("../../models/DAO/SeccionDAO.php");

$id_seccion = intval($_POST['id_seccion']);
$nombre = $_POST['nombre'];

if (!empty($id_seccion) && !empty($nombre)) {

    $secciondto = new SeccionDTO();

    $secciondto->setId_seccion($id_seccion);
    $secciondto->setNombre($nombre);

    $secciondao = new SeccionDAO();

    $resultado = $secciondao->actualizarSeccion($secciondto);
 
    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡La seccion se ha actualizado correctamente!</div>";

    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la sección</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


