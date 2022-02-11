<?php

require_once ("../../models/DAO/SucursalDAO.php");


$nombre = $_POST['nombre'];

if (!empty($nombre)) {

    $sucursaldto = new SucursalDTO();

    $sucursaldto->setNombre($nombre);

    $sucursaldao = new SucursalDAO();

    $resultado = $sucursaldao->registrarSucursal($sucursaldto);

    if ($resultado) {
        echo "<div class='alert alert-success' role='alert'>¡La sucursal se ha registrado correctamente!</div>";
    
    }else{
        echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar la sucursal</div>";
    }

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
