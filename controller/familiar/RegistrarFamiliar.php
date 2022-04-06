<?php

require_once('../../models/DAO/FamiliarDAO.php');

if (isset($_POST['id_familiar']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['edad']) 
    && isset($_POST['escolaridad']) && isset($_POST['parentesco']) && isset($_POST['id_usuario'])) {

        $id_familiar = $_POST['id_familiar'];
        $nombre = $_POST['nombre'];
        $apellido  = $_POST['apellido'];
        $edad = $_POST['edad'];
        $escolaridad = $_POST['escolaridad'];
        $parentesco = $_POST['parentesco'];
        $id_usuario = $_POST['id_usuario'];


        if (!empty($id_familiar) && !empty($nombre) && !empty($apellido) && !empty($edad) 
            && !empty($parentesco) && !empty($id_usuario)) {

            if (preg_match('/[0-9]+/',$id_familiar)) {

                if (preg_match('/^[a-zA-Z\d]*$/', $nombre)) {

                    if (preg_match('/^[a-zA-Z\d]*$/', $apellido)) {

                        if (preg_match('/[0-9]+/', $edad)) {

                            if (preg_match('/^[a-zA-Z\d]*$/', $escolaridad)){

                                if (preg_match('/^[a-zA-Z\d]*$/', $parentesco)) {

                                    if (preg_match('/[0-9]+/',$id_usuario)) {

                                        $id_familiar = intval($id_familiar);
                                        $edad = intval($edad);
                            
                                        $familiardto = new FamiliarDTO();
                            
                                        $familiardto->setId_familiar($id_familiar);
                                        $familiardto->setNombre($nombre);
                                        $familiardto->setApellido($apellido);
                                        $familiardto->setEdad($edad);
                                        $familiardto->setEscolaridad($escolaridad);
                                        $familiardto->setParentesco($parentesco);
                                        $familiardto->setUsuario($id_usuario);
                            
                                        $familiardao = new FamiliarDAO();
                            
                                        $resultado = $familiardao->registrarFamiliar($familiardto);
                            
                                        if ($resultado) {
                                            echo "<div class='alert alert-success' role='alert'>¡El familiar se ha registrado correctamente!</div>";
                                        
                                        }else{
                                            echo "<div class='alert alert-danger' role='alert'>Error! No se pudo registrar el familiar </div>";
                                        }

                                    }else{
                                        echo "<div class='alert alert-danger' role='alert'>El usuario no es valido</div>";
                                    }
                                }else{
                                    echo "<div class='alert alert-danger' role='alert'>El parentesco no es valido</div>";

                                }
                            }else{
                                echo "<div class='alert alert-danger' role='alert'>La escolaridad no es valida</div>";

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
                echo "<div class='alert alert-danger' role='alert'>El número de docuemnto no es valido</div>";
            }
        
           
        
        }else{
            echo "<div class='alert alert-danger' role='alert'>Ingrese los datos, por favor</div>";
        }

    }else{
        echo "<div class='alert alert-danger' role='alert'>Error, está entrando a una sección de forma indebida</div>";
    }

