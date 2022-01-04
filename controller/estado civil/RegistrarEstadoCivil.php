<?php

require_once ("../../models/DAO/EstadoCivilDAO.php");

$nombre = $_POST['nombre'];

$estadoCivildto = new EstadoCivilDTO();

$estadoCivildto->setNombre($nombre);

$estadoCivildao = new EstadoCivilDAO();

$resultado = $estadoCivildao->registrarEstadoCivil($estadoCivildto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El estado civil se ha registrado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el estado civil</div>";
}