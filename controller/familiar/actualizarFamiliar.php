<?php

require_once ("../../models/DAO/FamiliarDAO.php");

if (isset($_POST['id_familiar'])) {

    $id_familiar = $_POST['id_familiar'];
    $nombre_familiar = $_POST['nombre_familiar'];
    $apellido_familiar = $_POST['apellido_familiar'];
    $edad_familiar = $_POST['edad_familiar'];
    $escolaridad_familiar = $_POST['escolaridad_familiar'];
    $parentesco_familiar = $_POST['parentesco_familiar'];

    $familiardto = new FamiliarDTO();

    for ($i=0; $i < count($id_familiar); $i++) { 
        $familiardto->setId_familiar($id_familiar[$i]);
        $familiardto->setNombre($nombre_familiar[$i]);
        $familiardto->setApellido($apellido_familiar[$i]);
        $familiardto->setEdad($edad_familiar[$i]);
        $familiardto->setEscolaridad($escolaridad_familiar[$i]);
        $familiardto->setParentesco($parentesco_familiar[$i]);

        $familiardao = new FamiliarDAO();

        $resultado = $familiardao->actualizarDatosFamiliares($familiardto);  
    }




if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡Los familiares se han actualizado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar los familiares</div>";
}

}else{
    echo "<div class='alert alert-danger' role='alert'>No hay datos de familiares para actualizar</div>";
}

