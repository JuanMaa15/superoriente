<?php 

require_once '../../models/DAO/HijoDAO.php';

if (isset($_POST)) {

    $id_hijo = $_POST['id'];
    
    $hijodao = new HijoDAO();

    $resultado = $hijodao->eliminarHijo($id_hijo);

    if ($resultado) {
        echo "Se eliminó el hijo";
    }else{
        echo "No se pudo eliminar el hijo";
    }

}

?>