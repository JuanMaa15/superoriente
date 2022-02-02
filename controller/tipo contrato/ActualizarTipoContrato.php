<?php

require_once ("../../models/DAO/TipoContratoDAO.php");


$id_tipo_contrato = intval($_POST['id_tipo_contrato']);
$nombre = $_POST['nombre'];

$tipoContratodto = new TipoContratoDTO();

$tipoContratodto->setId_tipo_contrato($id_tipo_contrato);
$tipoContratodto->setNombre($nombre);

$tipoContratodao = new TipoContratoDAO();

$resultado = $tipoContratodao->actualizarTipoContrato($tipoContratodto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El tipo de contrato se ha actualizado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el tipo de contrato</div>";
}