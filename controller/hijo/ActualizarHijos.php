<?php

require_once ("../../models/DAO/HijoDAO.php");

if (isset($_POST)) {
    if (isset($_POST['id_hijo'])) {

        $id_hijo = $_POST['id_hijo'];
        $nombre_hijo = $_POST['nombre_hijo'];
        $apellido_hijo  =$_POST['apellido_hijo'];
        $edad_hijo = $_POST['edad_hijo'];
        $fecha_nacimiento_hijo = $_POST['fecha_nacimiento_hijo'];
        $opc = $_POST['opc'];
    
        $hijodto = new HijoDTO();

        switch ($opc) {
            case '1':
                if (isset($id_hijo)) {
                    for ($i=0; $i < count($id_hijo); $i++) { 
                        if (!empty($nombre_hijo[$i])) {
            
                            $hijodto->setId_hijo($id_hijo[$i]);
                            $hijodto->setNombre($nombre_hijo[$i]);
                            $hijodto->setApellido($apellido_hijo[$i]);
                            $hijodto->setEdad($edad_hijo[$i]);
                            $hijodto->setFecha_nacimiento($fecha_nacimiento_hijo[$i]);
                            
                            $hijodao = new HijoDAO();
                            $resultado = $hijodao->actualizarDatosHijos($hijodto);
                        }
                    }
                }
            break;
            
            case '2':
                if (!empty($nombre_hijo)) {
            
                    $hijodto->setId_hijo($id_hijo);
                    $hijodto->setNombre($nombre_hijo);
                    $hijodto->setApellido($apellido_hijo);
                    $hijodto->setEdad($edad_hijo);
                    $hijodto->setFecha_nacimiento($fecha_nacimiento_hijo);
                    
                    $hijodao = new HijoDAO();
                    $resultado = $hijodao->actualizarDatosHijos($hijodto);
                }
            break;
        } 
    
        if ($resultado) {
            echo "<div class='alert alert-success' role='alert'>¡Los hijos se han actualizado correctamente!</div>";
    
        }else{
            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo actualizar los hijos</div>";
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>No hay datos de hijos para actualizar</div>";
     
    }
}
