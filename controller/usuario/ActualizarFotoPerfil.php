<?php

require_once '../../models/DAO/UsuarioDAO.php';

if (isset($_POST)) {

    $usuario = $_POST['id_usuario'];
    $archivo = $_FILES['archivo'];
    $nombre_archivo = $archivo['name'];
    $tipo = $archivo['type'];

    $errores = array();

    $archivo['name'] = $usuario."_".$nombre_archivo;

    $nombre_archivo = $archivo['name'];


    if (empty($archivo) || $tipo != "image/jpg" && $tipo != "image/jpeg" && $tipo != "image/png" && $tipo != "image/gif") {
       $errores['archivo'] = "Archivo no valido";
    }

   if (count($errores) == 0) {

        if (!is_dir('../../view/img/foto_perfil')) {
            mkdir('foto_perfil', 0777);
        }else{
            move_uploaded_file($archivo['tmp_name'], '../../view/img/foto_perfil/'. $nombre_archivo);

            $ruta = './../img/foto_perfil/'. $nombre_archivo;

            $usuariodto = new UsuarioDTO();
            $usuariodto->setId_usuario($usuario);
            $usuariodto->setFoto($ruta);

            $usuariodao = new UsuarioDAO();
            $resultado = $usuariodao->actualizarFotoPerfil($usuariodto);

            if ($resultado) {
                echo "Se ha importado correctamente el archivo";
            }else{
                echo "No se pudo compleatar la importación";
            }


            /* echo "<h1>Documento subido correctamente</h1>"; */
           
        }
   }

   header('Location: ../../view/lntAdmin/informacionEmpleado.php?doc='. $usuario); 

}else{
    header("Location: ../../view/lntAdmin/admin.php");
}


