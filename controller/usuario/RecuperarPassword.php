<?php


require_once ("../../models/DAO/UsuarioDAO.php");
require_once ("../../models/DTO/UsuarioDTO.php");

$id_usuario = $_POST['id_usuario'];
$password = $_POST['pass-nueva'];
$verificarPassword = $_POST['verificar-pass'];


if ($password == $verificarPassword) {

    $usuariodto = new UsuarioDTO();
    $usuariodto->setId_usuario($id_usuario);
    $usuariodto->setPassword($password);

    $usuariodao = new UsuarioDAO();

    $resultado = $usuariodao->nuevaClave($usuariodto);

    if ($resultado) {

        header("Location: ../../index.php");

    }else{

        echo "Error al actualizar la contraseña";

    }


}else{

    print "Las contraseñas no son iguales";

}
