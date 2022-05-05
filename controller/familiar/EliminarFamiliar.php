<?php 

require_once '../../models/DAO/FamiliarDAO.php';

if (isset($_POST)) {

    $id_familiar = $_POST['id'];
    
    $familiardao = new FamiliarDAO();

    $resultado = $familiardao->eliminarFamiliar($id_familiar);

    if ($resultado) {
        echo "Se eliminó el familiar";
    }else{
        echo "No se pudo eliminar el familiar";
    }

}

?>