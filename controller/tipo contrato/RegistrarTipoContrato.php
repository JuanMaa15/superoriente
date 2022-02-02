<?php

require_once ("../../models/DAO/TipoContratoDAO.php");


$nombre = $_POST['nombre'];

$tipoContratodto = new TipoContratoDTO();

$tipoContratodto->setNombre($nombre);

$tipoContratodao = new TipoContratoDAO();

$resultado = $tipoContratodao->registrarTipoContrato($tipoContratodto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El tipo de contrato se ha registrado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el tipo de contrato</div>";
}