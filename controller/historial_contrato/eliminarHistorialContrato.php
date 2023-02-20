<?php 

require_once '../../models/DAO/HistorialContratoDAO.php';

if (isset($_POST)) {

    $id_historial_contrato = intval($_POST['id']);
    
    $historialContratodao = new HistorialContratoDAO();

    $resultado = $historialContratodao->eliminarHistorialContrato($id_historial_contrato);

    if ($resultado) {
        echo "Se eliminó el contrato";
    }else{
        echo "No se pudo eliminar el historial de contrato";
    }

}

?>