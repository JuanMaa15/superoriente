<?php

require_once ("../../models/DAO/GeneroDAO.php");

$id_genero = intval($_POST['id_genero']);
$nombre = $_POST['nombre'];

$generodto = new GeneroDTO();

$generodto->setId_genero($id_genero);
$generodto->setNombre($nombre);

$generodao = new GeneroDAO();

$resultado = $generodao->actualizarGenero($generodto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El género se ha actualizado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar el género</div>";
}