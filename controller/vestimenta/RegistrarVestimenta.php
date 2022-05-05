<?php

require_once ("../../models/DAO/OtraVestimentaDAO.php");

$nombre = $_POST['nombre'];
$id_tipo_dotacion = $_POST['tipo_dotacion'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];

if (!empty($nombre) && !empty($id_tipo_dotacion) && $estado != "") {

    if (preg_match('/[0-9]+/',$id_tipo_dotacion)) {

        if (preg_match('/[0-9]+/',$estado)) {

            $id_tipo_dotacion = intval($id_tipo_dotacion);
            $cantidad = intval($cantidad);
            $estado = intval($estado);

            $otraVestimentadto = new OtraVestimentaDTO();

            $otraVestimentadto->setNombre($nombre);
            $otraVestimentadto->setTipo_dotacion($id_tipo_dotacion);
            $otraVestimentadto->setCantidad($cantidad);
            $otraVestimentadto->setEstado($estado);

            $otraVestimentadao = new OtraVestimentaDAO();

            $resultado = $otraVestimentadao->registrarVestimenta($otraVestimentadto);

            if ($resultado) {
                echo "<div class='alert alert-success' role='alert'>¡La vestimenta se ha registrado correctamente!</div>";
            
            }else{
                echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar la vestimenta</div>";
            }

        }else{
            echo "<div class='alert alert-danger' role='alert'>El estado no es valido</div>";
        }            

    }else{
        echo "<div class='alert alert-danger' role='alert'>El código del tipo de dotacion no es valido</div>";
    }

   

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
