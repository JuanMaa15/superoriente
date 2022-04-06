<?php

require_once ("../../models/DAO/ZapatoDAO.php");

$nombre = $_POST['nombre'];
$id_tipo_dotacion = $_POST['tipo_dotacion'];
$talla = $_POST['talla'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$validar = false;

for ($i=34; $i < 43; $i++) { 

        if(intval($talla) == $i){
            $validar = true;
        }

}

if (!empty($nombre) && !empty($id_tipo_dotacion) && !empty($talla) && !empty($estado)) {

    if (preg_match('/[0-9]+/',$id_tipo_dotacion)) {

        if ($validar) {

            if (preg_match('/[0-9]+/',$estado)) {

                $id_tipo_dotacion = intval($id_tipo_dotacion);
                $cantidad = intval($cantidad);
                $estado = intval($estado);
    
                $zapatodto = new ZapatoDTO();
    
                $zapatodto->setNombre($nombre);
                $zapatodto->setTipo_dotacion($id_tipo_dotacion);
                $zapatodto->setTalla($talla);
                $zapatodto->setCantidad($cantidad);
                $zapatodto->setEstado($estado);
    
                $zapatodao = new ZapatoDAO();
    
                $resultado = $zapatodao->registrarZapato($zapatodto);
    
                if ($resultado) {
                    echo "<div class='alert alert-success' role='alert'>¡El zapato se ha registrado correctamente!</div>";
                
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el zapato</div>";
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
