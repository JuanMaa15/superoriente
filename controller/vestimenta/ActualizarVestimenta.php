<?php

require_once ("../../models/DAO/OtraVestimentaDAO.php");

$id_vestimenta = $_POST['id_vestimenta'];
$nombre = $_POST['nombre'];
$id_tipo_dotacion = $_POST['tipo_dotacion'];
$talla = $_POST['talla'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];

if (!empty($id_vestimenta) && !empty($nombre) && !empty($id_tipo_dotacion) && !empty($talla)) {

    if (preg_match('/[0-9]+/',$id_tipo_dotacion)) {

        if ($talla == "XS" || $talla == "S" || $talla == "M" || $talla == "L" || $talla == "XL" || $talla == "XXL") {

            if (preg_match('/[0-9]+/',$estado)) {

                $id_vestimenta = intval($id_vestimenta);
                $id_tipo_dotacion = intval($id_tipo_dotacion);
                $cantidad = intval($cantidad);
                $estado = intval($estado);
    
                $otraVestimentadto = new OtraVestimentaDTO();
    
                $otraVestimentadto->setId_vestimenta($id_vestimenta);
                $otraVestimentadto->setNombre($nombre);
                $otraVestimentadto->setTipo_dotacion($id_tipo_dotacion);
                $otraVestimentadto->setTalla($talla);
                $otraVestimentadto->setCantidad($cantidad);
                $otraVestimentadto->setEstado($estado);
    
                $otraVestimentadao = new OtraVestimentaDAO();
    
                $resultado = $otraVestimentadao->actualizarVestimenta($otraVestimentadto);
    
                if ($resultado) {
                    echo "<div class='alert alert-success' role='alert'>¡La vestimenta se ha actualizado correctamente!</div>";
                
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar la vestimenta</div>";
                }
    
            }else{
                echo "<div class='alert alert-danger' role='alert'>El estado no es valido</div>";
            }            

        }else{
            echo "<div class='alert alert-danger' role='alert'>La talla no es valida</div>";
        }


    }else{
        echo "<div class='alert alert-danger' role='alert'>El código del tipo de dotacion no es valido</div>";
    }

   

}else{
    echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
}
