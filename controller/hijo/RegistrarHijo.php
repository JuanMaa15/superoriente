<?php

require_once('../../models/DAO/HijoDAO.php');

if (isset($_POST)) {

        $nombre = $_POST['nombre'];
        $apellido  = $_POST['apellido'];
        $edad = $_POST['edad'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $id_usuario = $_POST['id_usuario'];

        if (!empty($nombre) && !empty($apellido) && !empty($edad) && !empty($id_usuario)) {

                if (true) {

                    if (preg_match('/^[a-zA-Z\d]*$/', $apellido)) {

                        if (preg_match('/[0-9]+/', $edad)) {

                            $edad = intval($edad);
                
                            $hijodto = new HijoDTO();
                
                          
                            $hijodto->setNombre($nombre);
                            $hijodto->setApellido($apellido);
                            $hijodto->setFecha_nacimiento($fecha_nacimiento);
                            $hijodto->setEdad($edad);
                            $hijodto->setUsuario($id_usuario);

                            $hijodao = new HijoDAO();
                
                            $resultado = $hijodao->registrarHijo($hijodto);
                
                            if ($resultado) {
                                echo "<div class='alert alert-success' role='alert'>¡El hijo se ha registrado correctamente!</div>";
                            
                            }else{
                                echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el hijo </div>";
                            }

                        }else{
                            echo "<div class='alert alert-danger' role='alert'>La edad no es valida</div>";

                        }

                    }else{
                        echo "<div class='alert alert-danger' role='alert'>El apellido no es valido</div>";

                    }
                }else{
                    echo "<div class='alert alert-danger' role='alert'>El nombre no es valido</div>";

                }
                       
        
        }else{
            echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
        }

}else{
    echo "<div class='alert alert-danger' role='alert'>Error, está entrando a una sección de forma indebida</div>";
}

