<?php 

require_once '../../models/DAO/HistorialCargoDAO.php';

if (isset($_POST)) {

    $id_historial_cargo = intval($_POST['id']);
    
    $historialCargodao = new HistorialCargoDAO();

    $resultado = $historialCargodao->eliminarHistorialCargo($id_historial_cargo);

    if ($resultado) {
        echo "Se eliminó el historial de cargo";
    }else{
        echo "No se pudo eliminar el historial de cargo";
    }

}

?>