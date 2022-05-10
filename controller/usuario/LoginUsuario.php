<?php

require_once '../../models/DAO/UsuarioDAO.php';

switch($_GET['accion']) {
    case "ingresar":

        require_once ("../../models/DAO/UsuarioDAO.php");
        require_once ("../../models/DTO/UsuarioDTO.php");

        $correo = $_POST['correo-login'];
        $pass = $_POST['pass-login'];

        $usuariodto = new UsuarioDTO();

        $usuariodto->setCorreo($correo);
        $usuariodto->setPassword($pass);

        $usuariodao = new UsuarioDAO();

        $resultado = $usuariodao->loginUsuario($usuariodto);

        if ($resultado != null){

            $usuariodao = new UsuarioDAO();
            $listaUsuariosId = $usuariodao->listaUsuariosConId();

            $fechaActual = date('Y-m-d');
            $antiguedad = "";

            if ($resultado->getPerfil() == 2) {
                for ($i=0; $i < count($listaUsuariosId); $i++) { 
                    $fecha_actual = date_create(date('dmy'));
                    $fecha_ingreso = date_create($listaUsuariosId[$i]->getFecha_ingreso());
                    $antiguedad = date_diff($fecha_actual, $fecha_ingreso);
    
                    $fecha_nacimiento = date_create($listaUsuariosId[$i]->getFecha_nacimiento());
                    $edad = date_diff($fecha_actual, $fecha_nacimiento);

                    echo $fechaActual;
                    
                    $usuariodao->actualizarDatosAuto($listaUsuariosId[$i]->getId_usuario(), strval($fechaActual), $antiguedad->format('%y')." años, " .$antiguedad->format('%m')." meses y ".$antiguedad->format('%d'). " días", $edad->format('%y'));
                }

                session_start();

                $_SESSION['id_admin'] = $resultado->getId_usuario();
                $_SESSION['nombre_admin'] = $resultado->getNombre();

                header("Location: ../../view/lntAdmin/admin.php");
            }else{
                session_start();

                $_SESSION['id_empleado'] = $resultado->getId_usuario();
                $_SESSION['nombre_empleado'] = $resultado->getNombre();
                

                header("Location: ../../view/lntEmpleado/empleado.php");
            }

        }else{

            header("Location:../../index.php?error=credenciales_incorrectas");
        
        }

    break;
    case 'cerrar':
        
            session_start();

            session_destroy();

            header("Location: ../../index.php");

    break;
}

