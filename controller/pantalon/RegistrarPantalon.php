<?php

require_once ("../../models/DAO/PantalonDAO.php");

$nombre = $_POST['nombre'];
$id_tipo_dotacion = $_POST['tipo_dotacion'];
$talla = $_POST['talla'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$genero = $_POST['genero'];

$validar = false;

for ($i=4; $i < 46; $i++) { 

    if ($i % 2 == 0) {

        if(intval($talla) == $i){
            $validar = true;
        }

    }
    

}

if (!empty($nombre) && !empty($id_tipo_dotacion) && !empty($talla) && $estado != "") {

    if (preg_match('/[0-9]+/',$id_tipo_dotacion)) {

        if ($validar) {

            if (preg_match('/[0-9]+/',$estado)) {

                $id_tipo_dotacion = intval($id_tipo_dotacion);
                $cantidad = intval($cantidad);
                $estado = intval($estado);
                $genero = intval($genero);
                
                $pantalondto = new PantalonDTO();
    
                $pantalondto->setNombre($nombre);
                $pantalondto->setTipo_dotacion($id_tipo_dotacion);
                $pantalondto->setTalla($talla);
                $pantalondto->setCantidad($cantidad);
                $pantalondto->setGenero($genero);
                $pantalondto->setEstado($estado);
    
                $pantalondao = new PantalonDAO();
    
                $resultado = $pantalondao->registrarPantalon($pantalondto);
    
                if ($resultado) {
                    echo "<div class='alert alert-success' role='alert'>¡El pantalón se ha registrado correctamente!</div>";
                
                }else{
                    echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el pantalón</div>";
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
