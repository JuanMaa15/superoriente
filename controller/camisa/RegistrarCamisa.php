<?php

require_once ("../../models/DAO/CamisaDAO.php");

$nombre = $_POST['nombre'];
$id_tipo_dotacion = $_POST['tipo_dotacion'];
$talla = $_POST['talla'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$genero = $_POST['genero'];

if (!empty($nombre) && !empty($id_tipo_dotacion) && !empty($talla) && $estado != "") {

    if (preg_match('/[0-9]+/',$id_tipo_dotacion)) {

        if ($talla == "XS" || $talla == "S" || $talla == "M" || $talla == "L" || $talla == "XL" || $talla == "XXL" || $talla == "3XL") {

            if (preg_match('/[0-9]+/',$estado)) {

                $id_tipo_dotacion = intval($id_tipo_dotacion);
                $cantidad = intval($cantidad);
                $estado = intval($estado);
                $genero = intval($genero);
                $camisadto = new CamisaDTO();
    
                $camisadto->setNombre($nombre);
                $camisadto->setTipo_dotacion($id_tipo_dotacion);
                $camisadto->setTalla($talla);
                $camisadto->setCantidad($cantidad);
                $camisadto->setEstado($estado);
                $camisadto->setGenero($genero);
    
                $camisadao = new CamisaDAO();
    
                $resultado = $camisadao->registrarCamisa($camisadto);
    
                if ($resultado) {
                    echo "<div class='alert alert-success' role='alert'>¡La camisa se ha registrado correctamente!</div>";
                
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar la camisa</div>";
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
