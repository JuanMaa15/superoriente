<?php

require_once '../../models/DAO/DocumentoDAO.php';

if (isset($_POST)) {

    $usuario = $_POST['id_usuario'];
    $titulo = $_POST['titulo'];
    $archivo = $_FILES['archivo'];
    $nombre_archivo = $archivo['name'];
    $tipo = $archivo['type'];

    $errores = array();

    if (empty($titulo)) {
        $errores['titulo'] = "titulo no valido";
    }

    if (empty($archivo) || $tipo != "application/pdf") {
        $errores['archivo'] = "Archivo no valido";
    }

   if (count($errores) == 0) {

        if (!is_dir('../../view/doc')) {
            mkdir('doc', 0777);
        }else{
            move_uploaded_file($archivo['tmp_name'], '../../view/doc/'. $nombre_archivo);

            $ruta = './../doc/'. $nombre_archivo;

            $documentodto = new DocumentoDTO();
            $documentodto->setUsuario($usuario);
            $documentodto->setNombre($titulo);
            $documentodto->setRuta($ruta);

            $documentodao = new DocumentoDAO();
            $resultado = $documentodao->registrarDocumento($documentodto);

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


