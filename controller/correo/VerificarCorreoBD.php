<?php 
    require ("../../config/correo/CorreoRecuperarClave.php");

    require_once ("../../models/DAO/UsuarioDAO.php");


    $correo = $_POST['correo'];

   // $resultado = $correoRecuperacion->correoRecuperarClave($correo, $asunto, $mensaje, $nombre);

   if (!empty($correo)) {


        $usuariodao = new UsuarioDAO();

        $resultado = $usuariodao->verificarCorreoBd($correo);

        if ($resultado) {

            echo "Este correo ya está registrado";

        }else{
            echo "";
        }

        

   }

    