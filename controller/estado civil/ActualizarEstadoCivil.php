<?php

require_once ("../../models/DAO/EstadoCivilDAO.php");

$id_estado_civil = intval($_POST['id_estado_civil']);
$nombre = $_POST['nombre'];

$estadoCivildto = new EstadoCivilDTO();

$estadoCivildto->setId_estado_civil($id_estado_civil);
$estadoCivildto->setNombre($nombre);

$estadoCivldao = new EstadoCivilDAO();

$resultado = $estadoCivldao->actualizarEstadoCivil($estadoCivildto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El estado civil se ha actualizado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el estado civil</div>";
}