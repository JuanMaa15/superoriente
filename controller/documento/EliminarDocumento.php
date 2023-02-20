<?php 

require_once '../../models/DAO/DocumentoDAO.php';

if (isset($_POST)) {

    $id_documento = intval($_POST['id']);
    
    $documentodao = new DocumentoDAO();

    $resultado = $documentodao->eliminarDocumento($id_documento);

    if ($resultado) {
        echo "Se eliminó el documento";
    }else{
        echo "No se pudo eliminar el documento";
    }

}

?>