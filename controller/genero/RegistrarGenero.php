<?php

require_once ("../../models/DAO/GeneroDAO.php");

$nombre = $_POST['nombre'];

$generodto = new GeneroDTO();

$generodto->setNombre($nombre);

$generodao = new GeneroDAO();

$resultado = $generodao->registrarGenero($generodto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El género se ha registrado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el género</div>";
}