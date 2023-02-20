<?php

require_once ("../../models/DAO/HistorialDotacionDAO.php");

$id_usuario = $_POST['id_usuario'];
$tipo_dotacion = $_POST['tipo_dotacion'];
$camisa = $_POST['camisa'];
$pantalon = $_POST['pantalon'];
$zapato = $_POST['zapato'];
$vestimenta = $_POST['vestimenta'];
$fecha = date("ymd");

$historialDotaciondto = new HistorialDotacionDTO();

$historialDotaciondto->setUsuario($id_usuario);
$historialDotaciondto->setTipo_dotacion($tipo_dotacion);
$historialDotaciondto->setCamisa($camisa);
$historialDotaciondto->setPantalon($pantalon);
$historialDotaciondto->setZapato($zapato);
$historialDotaciondto->setVestimenta($vestimenta);
$historialDotaciondto->setFecha($fecha);

$historialDotaciondao = new HistorialDotacionDAO();

$resultado = $historialDotaciondao->registrarHistorialDotacion($historialDotaciondto);

if ($resultado) {
    echo "<div class='alert alert-success' role='alert'>¡El tipo de dotación se ha registrado correctamente!</div>";

}else{
    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el tipo de dotación</div>";
}