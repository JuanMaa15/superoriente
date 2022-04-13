<?php 
    require ("../../config/correo/CorreoRecuperarClave.php");

    require_once ("../../models/DAO/UsuarioDAO.php");
    require_once ("../../models/DTO/UsuarioDTO.php");


    $correo = $_POST['correo-recuperacion'];

    $usuariodao = new UsuarioDAO();

    $usuariodto = $usuariodao->recuperarClave($correo);
    

    if ($usuariodto != null) {

        $correoRecuperacion = new CorreoRecuperacion();

        $asunto = utf8_decode("Recuperación de la contraseña");
        $mensaje = "<html><body>Hola, " . $usuariodto->getNombre() . "  Seleccione el siguiente enlace: <a href='http://localhost:8081/proyecto carta laboral/Desarrollo/formrecuperacion.php?doc=" . $usuariodto->getId_usuario() . "'>Restablecer mi contraseña</a></body></html>"; 
        $nombre = $usuariodto->getNombre();
       $resultado = $correoRecuperacion->correoRecuperarClave($correo, $asunto, $mensaje, $nombre);

        if ($resultado) {

            header("Location: ../../respuestaCorreo.php");

        }else{

           header("Location: ../../recuperarClave.php?error=credenciales_incorrectas");
        }


    }else{
        header("Location: ../../recuperarClave.php?error=credenciales_incorrectas");
    }

