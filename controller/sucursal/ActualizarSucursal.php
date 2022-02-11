<?php

require_once ("../../models/DAO/SucursalDAO.php");

$id_sucursal = intval($_POST['id_sucursal']);
$nombre = $_POST['nombre'];

if (!empty($id_sucursal) && !empty($nombre)) {

    $sucursaldto = new SucursalDTO();

    $sucursaldto->setId_sucursal($id_sucursal);
    $sucursaldto->setNombre($nombre);

    $sucursaldao= new SucursalDAO();

    $resultado = $sucursaldao->actualizarSucursal($sucursaldto);
 
    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡La sucursal se ha actualizado correctamente!</div>";

    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la sucursal</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";

}


