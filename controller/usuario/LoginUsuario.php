<?php



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

            if ($resultado->getPerfil() == 2) {
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

